<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB,Session;

class WechatController extends Controller
{
    private $token = 'weChat';
    private $appid = 'wxfc5cb7a4ac38befa';
    private $appsecret = 'e7ad8d8556b7412d58eb61f3fcfec26a';
    //AzbrJY_RikmHiTGXWbWS7-TZR729AOJnhJevNF2nDaAW0VV5zfKG3gBGnCpXdQQzzE7xJ3y1Sk81CaseKlXu-LOZzIEuN8wNAJM8hphnfg6QLf31ltlwkEF1EOWAKANvLVEdAIAPZI

    /**
     * 点击微信登录按钮，展示二维码页面
     */
    public function oAuth()
    {
        // 生成二维码
        /*$scope = 'snsapi_userinfo';
        $redirect_uri = urlencode('http://611a9343.ngrok.natapp.cn/JiuZuCheBa/public/weChatLogin');
        $code_url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=$this->appid&redirect_uri=$redirect_uri&response_type=code&scope=$scope&state=STATE#wechat_redirect";
        $qrCode = file_get_contents('http://api.k780.com:88/?app=qr.get&data=' . $code_url . '&level=L&size=10');
        file_put_contents('home/images/login/qrcode.png', $qrCode);*/
        return view('home.login.qrCode');
    }

    public function valid(Request $request)
    {
        // 微信服务器发来的字符串
        $echoStr = $request->input('echostr');

        $signature = $request->input('signature');
        $timestamp = $request->input('timestamp');
        $nonce = $request->input('nonce');
        if ($this->checkSignature($signature, $timestamp, $nonce)) {
            echo $echoStr;
            exit;
        }
    }

    /**
     * 微信公众号的对接
     * @param $signature
     * @param $timestamp
     * @param $nonce
     * @return bool
     */
    private function checkSignature($signature, $timestamp, $nonce)
    {
        $tmpArr = array($this->token, $timestamp, $nonce);
        // use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

    public function weChatLogin(Request $request)
    {
        $code = $request->input('code');

        // 使用CODE获取用户openid和access_token（网页授权token）
        $openid_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$this->appid&secret=$this->appsecret&code=$code&grant_type=authorization_code";
        $json = file_get_contents($openid_url);
        $array = json_decode($json, true);

        // 使用access_token获取用户信息
        $user_info_url = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $array['access_token'] . "&openid=" . $array['openid'] . "&lang=zh_CN";
        $json = file_get_contents($user_info_url);
        $user_info = json_decode($json, true);

        // 记录用户信息
        if ($user_info && is_array($user_info) && !empty($user_info)) {
            // 查询用户是否存在
            $user = DB::table('user')->where('user_name', 'wx_' . $user_info['nickname'])->first();

            // 存在的话直接登录，不存在的话直接注册，并加10信用积分
            if (empty($user)) {
                $user = array(
                    'user_name' => 'wx_' . $user_info['nickname'],
                    'reg_time' => time(),
                    'credit' => '10'
                );
                $user_id = DB::table('user')->insertGetId($user);
                $user['user_id'] = $user_id;

                // 微信注册 +10 信用
                DB::table('credit')->insert([
                    'user_id' => $user_id,
                    'points' => 10,
                    'status' => 1,
                    'reason' => '微信注册加 10 信用积分',
                    'add_time' => time()
                ]);
            }

            session(['user_id' => $user['user_id'], 'user_name' => $user['user_name']]);
            return redirect('/');
        }
    }
}
