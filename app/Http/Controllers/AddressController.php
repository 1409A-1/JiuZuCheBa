<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    public function address()
    {
        $arr = DB::table('address')
            ->where(['parent_id' => 0])
            ->get();
        return view('admin.address.address',['data' => $arr]);
    }
    public function address_two()
    {
        $id = $_GET['id'];
        if($id != 0){
            $arr = DB::table('address')
                ->where(['parent_id' => $id])
                ->get();
            $arr = json_encode($arr);
            echo $arr;
        }else{
            echo 0;
        }
    }
}
