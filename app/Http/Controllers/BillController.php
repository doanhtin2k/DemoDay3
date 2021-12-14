<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class BillController extends Controller
{
    //
    public function index()
    {
        $cates = Category::all();
        $carts = session("carts");
        $totalItem=0;
        foreach($carts AS $cart)
        {
            $totalItem += $cart['quantity'];
        }
        return view("bill.index",["cates" => $cates,"totalItem" => $totalItem]);
    }
    public function create(Request $request)
    {
            // save bill


            // save order



           // send email
    }
}
