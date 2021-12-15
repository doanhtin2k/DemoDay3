<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Book;
class CartController extends Controller
{
    public function index()
    {
        $carts=[];
        if(session()->has("carts"))
        {
            $carts = session("carts");
        }
        $totalPrice=0;
        foreach ($carts as $cart)
        {
            $totalPrice += $cart['book']['price'] * $cart["quantity"];
        }
        $cates = Category::all();
        return view("cart.index",["cates" => $cates, "carts" => $carts, "totalPrice" => $totalPrice]);
    }
    public function addToCart(Request $request)
    {
           // session(["doanh"=>$request->book_id]);
        $book = Book::findOrFail($request->book_id);
        if(session()->has("carts"))
        {
                $carts = session("carts");
                $is = array_key_exists($request->book_id,  $carts);
                if($is)
                {
                    $carts[$request->book_id]["quantity"]++;
                }else{
                    $carts[$request->book_id] = [
                        'book' => $book,
                        'quantity'=>1,
                    ];
                }

            session(["carts" => $carts]);
        }else{

            $carts[$request->book_id] = [
                'book' => $book,
                'quantity'=>1,
            ];
            session(["carts" => $carts]);
        }
    }
}
