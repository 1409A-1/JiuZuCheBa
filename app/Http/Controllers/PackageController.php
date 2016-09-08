<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Request;

class PackageController extends Controller
{
    public function package()
    {
        $arr = DB::table('package')
            ->get();
        return view('admin.package.package_list',['data' => $arr]);
    }
    public function packageIns(Request $request)
    {
        if($request->has('_token')){
            DB::table('package')
                ->insert($request);
            return redirect('package');
        }else{
            return view('admin.package.package_ins');
        }
    }
    public function pack_del(Request $pack_id)
    {
        DB::table('package')
            ->where(['pack_id' => $pack_id])
            ->delete();
        return redirect('package');
    }
    public function userPack()
    {
        $arr = DB::table('')
            ->get();
    }
}
