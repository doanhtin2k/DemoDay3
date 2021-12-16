<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
class LoginController extends Controller
{
    //
    public function index()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            ]);

        $arr = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        if (Auth::guard('admin')->attempt($arr)) {

            return redirect()->route("home.admin");
        } else {
            $error="sai tai khoan hoac mat khau";
            return view('admin.login',['error'=>$error]);
        }

    }
}
