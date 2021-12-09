<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    //
    public function index()
    {
        return view("admin.register");
    }
    protected function create(array $data)
    {
        return Admin::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function register(Request $request)
    {
        //dd($request->all());
       $this->create($request->all());
       return redirect()->route("form.login.admin");
    }
}
