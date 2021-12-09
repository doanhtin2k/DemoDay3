<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class LogoutController extends Controller
{
    //
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('form.login.admin');
    }
}
