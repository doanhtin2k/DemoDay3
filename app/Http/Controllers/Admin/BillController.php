<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
class BillController extends Controller
{
    //
    public function index()
    {
        $bills = Bill::paginate(5);
        return view("admin.bill.index",['bills'=>$bills]);
    }
}
