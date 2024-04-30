<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userinfo extends Controller
{
    function qr_code_generator(Request $req){
        $req->validate([
            'name' => 'required',
            'roomno' => 'required',
            'time' => 'required',
            'hostel' => 'required',
            'description'=>'required',
            'contactNo'=>'required'
        ]);
        $result = DB::table('user')->insert([
            'name' => $req->input('name'),
            'roomnu' => $req->input('roomno'),
            'perfecttime' => $req->input('time'),
            'hostel' => $req->input('hostel'),
            'discription' => $req->input('description'),
            'contactNo' => $req->input('contactNo')
        ]);
        $user = DB::table('user')->where('contactNo', $req->input('contactNo'))->get();
        if ($result) {
            return view('downloadqr',['data'=>$user]);
        } else {
            return back()->with('fail', 'sorry try it again please');
        }
    }
    function deleteqr(Request $req){
        $id=$req->input('id');
        echo $id;
        $result = DB::table('user')->where('id', $id)->limit(1)->delete();
        if ($result) {
            echo "Deleted Successfully";
            // return back()->with('success', 'hii there you have successfully deleted booking✌');
        } else {
            echo "there are something wrong";
            // return back()->with('fail', 'sorry try it again please');
        }
    }
    function order(Request $req){
        $data = DB::table('orders')->where('id',$req->input('id'))->whereNot('status', 3)->join('user', 'orders.userid', '=', 'user.id')->get();
        // $data0 = DB::table('orders')->where('id',$req->input('id'))->where('status', 0)->join('user', 'orders.userid', '=', 'user.id')->get();
        // $data1 = DB::table('orders')->where('id',$req->input('id'))->where('status', 1)->join('user', 'orders.userid', '=', 'user.id')->get();
        // $data2 = DB::table('orders')->where('id',$req->input('id'))->where('status', 2)->join('user', 'orders.userid', '=', 'user.id')->get();
        // $data3 = DB::table('orders')->where('id',$req->input('id'))->where('status', 3)->join('user', 'orders.userid', '=', 'user.id')->get();
        // // echo $data;
        return view('orderform',['data' => $data, 'id'=> $req->input('id')]);
    }
    function orderAmount(Request $req){
        $req->validate([
            'amount' => 'required',
        ]);
        $result = DB::table('orders')->insert([
            'userid' => $req->input('id'),
            'status' =>0,
            'amount' => $req->input('amount'),
            
        ]);
        if ($result) {
            $data = DB::table('orders')->where('id',$req->input('id'))->whereNot('status', 3)->join('user', 'orders.userid', '=', 'user.id')->get();
            return view('orderform',['data'=>$data,'id'=>$req->input('id')]);
        } else {
            $data = DB::table('orders')->where('id',$req->input('id'))->whereNot('status', 3)->join('user', 'orders.userid', '=', 'user.id')->get();
            return view('orderform',['data'=>$data,'id'=>$req->input('id')])->with('fail', 'sorry try it again please');
        }
    }
}
