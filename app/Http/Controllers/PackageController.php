<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * username:wanghu
     * time:2016/9/9
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function package()
    {
        $arr = DB::table('package')
            ->get();
        return view('admin.package.package_list',['data' => $arr]);
    }
    public function packageIns(Request $request)
    {
        if($request->has('_token')){
            $pack = $request->all();
            unset($pack['_token']);
            DB::table('package')
                ->insert($pack);
            return redirect('package');
        }else{
            return view('admin.package.package_ins');
        }
    }
    public function packDel($id)
    {
         DB::table('package')
            ->where(['pack_id' => $id])
            ->delete();
        return redirect('package');
    }
    public function userPack()
    {

    }
}
 