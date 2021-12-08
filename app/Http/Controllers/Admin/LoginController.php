<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
class LoginController extends Controller
{
    //
    public function index()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $error="";
        $admin = Admin::Where('username',$request->username)->first();
        if(empty($admin))
        {
            $error="username khong ton tai";
            return view('admin.login',['error'=>$error]);
        }else{
            if($admin->password==$request->password)
            {
                   session(['admin'=>$admin]);
                   return redirect()->route('home.admin');
            }else{
                $error="sai mat khau";
                return view('admin.login',['error'=>$error]);  
            }
        }
        
    }
}
