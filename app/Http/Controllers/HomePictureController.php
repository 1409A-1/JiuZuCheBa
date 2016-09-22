<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Picture;
use Validator;

class HomePictureController extends Controller
{
	/*
	   前台首页图片展示
	 */
    public function manage()
    {
        $count = Picture::count();
        $page = 1;
        $prev = $page == 1? 1: $page-1;
        $next = $page == $count? $count: $page+1;
        $length = 5;
        $pages = ceil($count/$length);
        $offset = ($page-1)*$length;
        $picture=Picture::take($length)->skip($offset)->get()? Picture::take($length)->skip($offset)->get()->toArray(): array();
        return view('admin.picture.pictureList', ['data' => $picture, 'pages' => $pages, 'prev' => $prev, 'next' => $next, 'page' => $page]);
    }

    /*
       前台图片分页删除
     */
    public function pictureDel(Request $request,$page = 1,$del)
    {
        if ($del != 0) {
            Picture::where('picture_id', $del)->delete();
        }
        $count = Picture::count();
        //$page = 1;
        $prev = $page == 1? 1: $page-1;
        $next = $page == $count? $count: $page+1;
        $length = 5;
        $pages = ceil($count/$length);
        $offset = ($page-1)*$length;
        $picture=Picture::take($length)->skip($offset)->get()? Picture::take($length)->skip($offset)->orderBy('type')->get()->toArray(): array();
        return json_encode(['picture' => $picture, 'pages' => $pages,'prev' => $prev, 'next' => $next, 'page' => $page]);
    }

    /*
        图片添加
     */
    public function pictureAdd(Request $request)
    {
        if (!$request->has('_token')) {
            return view('admin.picture.pictureAdd');
        }else{
            $date = $request->input();
            //print_r($date);die;
            unset($date['_token']);
            $date['isUse'] = 0;
            $num = $this->imgNum($date['type']);
            if ($date['type'] == 0 && $num>=5) {
                $date['isUse'] = 1;
            }elseif ($date['type'] == 1 && $num>=3) {
                $date['isUse'] = 1;
            }
            $file = $request->file('img');
            $hou = $file->getClientOriginalExtension();//文件后缀
            $url = url('');
            //echo $url;die;
            $path = './home/img/';
            $filename = rand(1, 999) . "." . $hou;
            $car_img = $path . $filename;     //文件路径
            $file->move($path, $filename);  // 移动文件到指定目录
            $date['dir'] = $url.$car_img;
            Picture::create($date);
            return redirect('picture');
        }
    }

    /*
        修改图片使用状态
     */
    public function pictureEdit(Request $request, $pictureId)
    {
        $picture = Picture::where("picture_id", $pictureId)->first()->toArray();
        $num = $this->imgNum($picture['type']);
        if ($picture ['type'] == 0 && $num>=5) {
            return json_encode(['status' => "turnFull"]);
        }elseif ($picture ['type'] == 1 && $num>=3) {
            return json_encode(['status' => "activeFull"]);
        }else{
            if ($picture['isUse'] == 0){
                Picture::where("picture_id", $pictureId)->update(['isUse' => 1]);
                return json_encode(['status' => "unuse"]);
            }else{
                Picture::where("picture_id", $pictureId)->update(['isUse' => 0]);
                return json_encode(['status' => "usabled"]);
            }
        }
        
    }

    /*
        查询使用中图片数量
     */
    public function imgNum($type)
    {
        return Picture::where("type", $type)->where('isUse', 0)->count();
    }
}
