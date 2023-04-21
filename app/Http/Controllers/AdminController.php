<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class AdminController extends Controller
{
    public function index(){
        return view('login_admin');
    }

    public function homeadmin(){
        return view('admin.layout1_admin');
    }








    public function loginadmin(Request $request)
            {
                $email_admin = $request->email_admin;
                $password_admin = md5($request->password_admin);
        
                $result = DB::table('tbladmin')->where('email_admin', $email_admin)->
                where('password_admin',$password_admin)->first();
                if($result){
                    Session::put('name_admin',$result->name_admin);
                    Session::put('id_admin',$result->id_admin);
                    return view('admin.layout1_admin');
                }else {
                    Session::put('message','Mat khau hoac tai khoan bi sai');
                    return Redirect::to('/admin');
                }
                // return view('admin.layout1_admin');

        
    }

    public function logoutadmin()
            {
                Session::put('name_admin',null);
                Session::put('id_admin',null);
                return Redirect::to('/admin');
            }
}
