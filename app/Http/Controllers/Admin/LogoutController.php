<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //
    public function logout()
    {
        session()->flush();
        return redirect()->route('form.login.admin');
    }
}
