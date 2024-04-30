<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class vendor extends Controller
{
    function login(Request $req)
    {
        return view('vendor.login');
    }

    function vdashboard(Request $req)
    {
        $data = DB::table('orders')->whereNot('status', 3)->whereNot('status', 2)->join('user', 'orders.userid', '=', 'user.id')->get();
        $data0 = DB::table('orders')->where('status', 0)->join('user', 'orders.userid', '=', 'user.id')->get();
        $data1 = DB::table('orders')->where('status', 1)->join('user', 'orders.userid', '=', 'user.id')->get();
        $data2 = DB::table('orders')->where('status', 2)->join('user', 'orders.userid', '=', 'user.id')->get();

        return view('vendor.vendor', ['data' => $data,'data0'=>$data0,'data1'=>$data1,'data2'=>$data2]);
    }
    function submitLogin(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'password' => 'required|min:5'
        ]);
        $username = $req->input('username');
        $password = $req->input('password');
        $user = DB::table('vender')->where('username', $username)->first();

        if (($username == $user->username) && ($password == $user->password)) {
            $req->Session()->put('vid', $user->id);
            return redirect('vdashboard')->with('success', 'congratuletions you have success-fully logged in');
        } else {
            return back()->with('fail', 'there are email or password are incorract');
        }
    }
    function cancel(Request $req)
    {
        $update = DB::table('orders')->where('orderid', $req->input('id'))->update(['status' => 3]);
        if ($update) {
            return redirect('vdashboard')->with('success', 'hii You have successfully canceled order');
        } else {
            return back()->with('fail', 'sorry try it again please');
        }
    }
    function delivered(Request $req)
    {
        $update = DB::table('orders')->where('orderid', $req->input('id'))->update(['status' => 2]);
        if ($update) {
            return redirect('vdashboard')->with('success', 'hii You have successfully delivered order');
        } else {
            return back()->with('fail', 'sorry try it again please');
        }
    }
    function comming(Request $req)
    {
        $update = DB::table('orders')->where('orderid', $req->input('id'))->update(['status' => 1]);
        if ($update) {
            return redirect('vdashboard')->with('success', 'hii You have successfully comming order');
        } else {
            return back()->with('fail', 'sorry try it again please');
        }
    }
}
