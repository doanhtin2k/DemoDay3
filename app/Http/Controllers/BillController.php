<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Order;
use App\User;
use App\Models\Book;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Bill;
use App\Notifications\OrderSuccess;

class BillController extends Controller
{
    //
    public function index()
    {
//        dd(Auth::user()->id);
        $cates = Category::all();
        $carts = session("carts");
        $totalItem=0;
        $totalPrice=0;
        foreach($carts AS $cart)
        {
            $totalItem += $cart['quantity'];
            $totalPrice += $cart['book']['price'] * $cart["quantity"];
        }

        return view("bill.index",["cates" => $cates,"totalItem" => $totalItem,"totalPrice" => $totalPrice]);
    }
    public function create(Request $request)
    {


        DB::transaction(function() use ($request) {
            // save bill
                $bill = new Bill();
                $bill->address = $request->address;
                $bill->numberphone = $request->numberPhone;
                $bill->user_id = Auth::user()->id;
                $totalItem = 0;
                $totalPrice=0;
                $carts = session("carts");
                foreach ($carts AS $cart)
                {
                    $totalItem += $cart["quantity"];
                    $totalPrice += $cart['book']['price'] * $cart["quantity"];
                }
                $bill->totalItem = $totalItem;
                $bill->totalPrice = $totalPrice;
                $bill->save();

            // save order
                foreach($carts AS $cart)
                {
                    $order = new Order();
                    $order->quantity = $cart["quantity"];
                    $order->user_id = Auth::user()->id;
                    $order->book_id = $cart["book"]->id;
                    $order->bill_id = $bill->id;
                    $order->save();
                    Auth::user()->notify(new OrderSuccess($bill));
                }
                // remove item in carts session
            session(["carts" => []]);
            // send email
        });
        return redirect()->route("home");
    }
    public function history()
    {
            $cates = Category::all();
            $bills = Auth::user()->bill;

            return view("bill.history",["cates" => $cates,"bills" => $bills]);
    }
    public function show($id)
    {
        $cates = Category::all();
        $bill = Bill::findOrFail($id);
        $books = $bill->books;
//        dd($books[0]->pivot->quantity);
        return view("bill.details",["cates" => $cates,"books" => $books,"bill"=>$bill]);
    }
}
