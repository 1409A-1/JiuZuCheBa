@include('common.home_header')
<link type="text/css" rel="stylesheet" href="home/css/login.css">
<script type="text/javascript" src="home/js/register.js"></script>

<!--登录注册-->
<div class="infoBox noCopy">
    <div>
        <div>
            <!--注册-->
            <div class="register">
                <div class="title">
                    <div>注册</div>
                    <span>已有账号？<a href="{{ URL('login') }}">立即登录</a></span>
                </div>
                <div class="input_body">
                    <div class="inputBox" id="reg_name_box">
                        <input placeholder="请输入姓名" maxlength="10" id="reg_name" type="text">
                        <!-- <i class="icon_login icon_l3"></i> -->
                    </div>
                    <div class="inputBox" id="reg_phone_box">
                        <input placeholder="请输入手机号码" maxlength="11" id="reg_phone" type="tel">
                        <!-- <i class="icon_login icon_l1"></i> -->
                    </div>
                    <div class="inputBox" id="reg_pw_box">
                        <input placeholder="请输入6位以上密码" maxlength="18" id="reg_pw" type="password">
                        <input value="请输入6位以上密码" maxlength="18" id="reg_pw0" type="text">
                        <!-- <i class="icon_login icon_l2"></i> -->
                    </div>
                    <!-- <div class="dx_code">
                        <input placeholder="请输入短信验证码" maxlength="6" id="reg_code" type="text">
                        <button id="reg_send_code">发送验证码</button>
                    </div> -->
                   
                    <!-- <div style="font-size:12px;color:#615656;margin-top:5px;">*如果一分钟内没有收到校验短信，您可以再次点击获取“语音验证码”，此服务免费。</div> -->
                    <div class="errorPrompt" id="regError"><!--错误提示--></div>
                    <button id="reg">注 册<i></i></button>
                    <div class="Prompt">
                        点击注册即表示您同意并愿意遵守就租车吧<b id="win">用户协议</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<textarea class="protocol layui-layer-wrap" readonly="disabled" style="display: none;"> 1．特别提示 1.1 武汉大方汽车租赁有限公司（以下简称"大方租车"）同意按照本协议的规定及其不时发布的操作规则提供基于互联网的相关服务（以下称"网络服务"），为获得网络服务，服务使用人（以下称"用户"）应当同意本协议的全部条款并按照页面上的提示完成全部的注册程序。用户注册成功即表示用户完全接受本协议项下的全部条款。 1.2 用户注册成功后，大方租车将给予每个用户一个用户帐号及相应的密码，该用户帐号和密码由用户自行保管。用户首次租赁车辆用车完毕后，如未产生任何纠纷，大方租车将通过邮递或其他方式向用户寄送会员卡。 1.3 为提供更好的服务，大方租车有权使用通过合法途径获得的用户其他身份信息（如身份证照片等）用于为用户提供服务，该信息是依据用户提供的身份信息而合法获取的，且仅限用于为客户提供服务。 2．服务内容 2.1 通过大方租车网站在线预订车辆、查询价格车型信息、对提供的服务发表意见等。（具体查看公司网页http://www.dafang24.com/） 3．服务变更、中断或终止 3.1 鉴于网络服务的特殊性，用户授权大方租车可随时变更、中断或终止部分或全部的网络服务。由于大方租车需要定期或不定期地对提供网络服务的平台（如互联网网站）或相关的设备进行检修或者维护，如因此类情况而造成网络服务在合理时间内的中断，大方租车无需为此承担任何责任。 3.2 如发生下列任何一种情形，大方租车有权在通知用户后中断或终止向用户提供本协议项下的网络服务而无需对用户或任何第三方承担任何责任： 3.2.1 用户提供的个人资料不真实； 3.2.2 用户违反本协议中规定的使用规则； 3.3 如用户注册的帐号在任何连续180日内未实际使用，则大方租车有权删除该帐号并停止为该用户提供相关的网络服务。 4．使用规则 4.1 用户在申请使用大方租车网络服务时，必须向大方租车提供准确的个人资料，如个人资料有任何变动，必须在三个工作日内更新。 4.2 用户需妥善保管其个人账号密码，无论基于何种相关目的，都不允许将帐号、密码转让或出借于他人使用。如用户发现其帐号遭他人非法使用，应当立即通知大方租车。因黑客行为、用户的保管疏忽导致帐号、密码遭他人非法使用或用户将其帐号、密码转让或出借于他人使用而导致任何的客户损失，大方租车不承担任何责任。 4.3 用户注册成功后，视为允许大方租车通过电子邮件或其他方式向用户发送大方租车的优惠服务信息。 4.4 用户在使用大方租车网络服务过程中，必须遵循以下原则： 4.4.1 遵守中国有关的法律和法规； 4.4.2 遵守所有与网络服务有关的网络协议、规定和程序； 4.4.3 不得为任何非法目的而使用网络服务系统； 4.4.4 不得利用大方租车网络服务系统进行任何不利于大方租车的行为 5．知识产权大方租车提供的服务中包含的任何文本、图片、图形、音频和/或视频资料均受版权、商标和/或其它财产所有权法律的保护，未经相关权利人同意，上述资料均不得在任何媒体直接或间接发布、播放、出于播放或发布目的而改写或再发行，或者被用于其他任何商业目的。所有这些资料或资料的任何部分仅可作为私人和非商业用途而保存在某台计算机内。大方租车为提供服务而使用的任何软件（包括但不限于软件中所含的任何图象、照片、动画、录像、录音、音乐、文字和附加程序、随附的帮助材料）的一切权利均属于该软件的著作权人，未经该软件的著作权人许可，用户不得对该软件进行反向工程（reverse engineer）、反向编译（decompile）或反汇编（disassemble）。 6．隐私保护 6.1 保护用户隐私是大方租车的一项基本政策，大方租车保证不对外公开或向第三方提供单独用户的注册资料及用户在使用网络服务时存储在大方租车的非公开内容，但下列情况除外： 6.1.1 事先获得用户的明确授权； 6.1.2 根据有关的法律法规要求； 6.1.3 按照相关政府主管部门的要求； 6.1.4 为维护社会公众的利益； 6.1.5 为维护大方租车的合法权益 6.2 当大方租车与第三方合作向用户提供相关的网络服务，在此情况下，如该第三方允诺严格承担与大方租车同等的保护用户隐私的责任，则视为客户授权大方租车将包含其个人注册资料在内的相关信息仅提供给该等第三方。 7．免责声明 7.1 用户明确同意其使用大方租车网络服务所存在的风险将完全由其自己承担；因其使用大方租车网络服务而产生的一切后果也由其自己承担，大方租车对用户不承担任何责任。 7.2 大方租车不保证为向用户提供便利而设置的外部链接的准确性和完整性。同时，对于该等外部链接指向的不由大方租车实际控制的任何网页上的内容，大方租车不承担任何责任。 7.3 对于因不可抗力或非因大方租车的原因造成的网络服务中断或其它缺陷，大方租车不承担任何责任。 8．违约赔偿 8.1 如因大方租车违反有关法律、法规或本协议项下的任何条款而给用户造成损失，大方租车同意承担由此造成的损害赔偿责任。 8.2 用户同意保障和维护大方租车及其他用户的合法利益，如因用户违反有关法律、法规或本协议项下的任何条款而给大方租车或任何其他第三人造成损失，用户同意承担由此造成的一切损害赔偿责任。 9．协议修改 9.1 大方租车有权随时修改本协议的任何条款，一旦本协议的内容发生变动，大方租车将会在http://www.hubeicar.cn/网站上公布修改之后的协议内容，该公布行为视为大方租车已经通知用户修改内容。 9.2 如果不同意大方租车对本协议相关条款所做的修改，用户有权停止使用网络服务。如果用户继续使用网络服务，则视为用户接受大方租车对本协议相关条款所做的修改 10．通知送达 10.1 本协议项下大方租车对于用户所有的通知均可通过网页公告、电子邮件、手机短信或常规的信件传送等方式进行；大方租车可任意选择其中一种方式通知用户，该通知于发送之日视为已送达用户，用户知悉并接受通知之内容。 10.2 用户如有任何事宜需通知大方租车，应当通过大方租车对外正式公布的通信地址、传真号码、电子邮件地址等联系方式进行联系及送达。 11．法律管辖如双方就本协议内容或其执行发生任何争议，双方应友好协商解决；协商不成时，任何一方均可向武汉大方汽车租赁有限公司所在地的人民法院提起诉讼。</textarea>
<!--底部-->
@include('common.home_footer');
