<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class DemodatabaseController extends Controller
{
    //
    public function index ()
    {
        // xóa file sử dụng storage tra ve boolean
        $kq = Storage::delete("public/uploads/1638958227_anh1.jfif");
        dd($kq);
        // DB::
        $admin = DB::select('select * from admins WHERE username=:username',["username"=>"doanhad"]);
        dd($admin);
    }
}
