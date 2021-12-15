<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Auth;
use Illuminate\Support\Collection;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::paginate(10);
        $cates = Category::all();
        $notifications = Auth::user()->notifications;
        return view('home',['books'=>$books,'cates'=>$cates,"notifications" => $notifications]);
    }
    public function category($title)
    {

        $cates = Category::all();

        // dd("$title");
        $books = Book::with(["category"=>function($query) use ($title){
                $query->Where("title","$title");
        }])->get();
        // dd($books);
        $books = collect($books);
        $books = $books->filter(function ($value, $key){
            return $value->category != null;//"danh muc 1"
        });
        return view("category",["books"=>$books,"title"=>$title,'cates'=>$cates]);
    }
}
