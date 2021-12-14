<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreBookRequest;
use  Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $items = Book::all();
//        $total = count($items);
//        $books = new LengthAwarePaginator($items->forPage(1, 5), $items->count(), 5, null, [ "path" => "http://127.0.0.1:8000/book-admin","pageName" => "page"]);
//        //$books = new LengthAwarePaginator($itemstoshow,3,5,null,[ "path" => "http://127.0.0.1:8000/book-admin","pageName" => "page"]);
//        dd($books);
        $books = Book::paginate(5);
        return view("admin.book.index",['books'=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cate = Category::all();
        return view("admin.book.create",['cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'short_description' => 'required',
        //     'price' => 'required|numberic',
        //     'image' => 'required',
        //     ]);
        $book = new Book();
        $book->name = $request->name;
        $book->short_description = $request->short_description;
        $book->price = $request->price;
        $book->category_id = $request->category_id;
        $image = $request->image;
        $name_image = time()."_".$image->getClientOriginalName();
        $path = $request->file('image')->storeAS(
            "public/uploads",$name_image
        );
        $book->image = "storage/uploads/".$name_image;

        $book->save();
        return redirect()->route("book-admin.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cate = Category::all();
        $book = Book::findOrFail($id);
        return view("admin.book.edit",['book'=>$book,'cate'=>$cate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'short_description' => 'required',
            'price' => 'required|numeric||min:0',
            ]);
        $book = Book::findOrFail($id);
        $book->name = $request->name;
        $book->short_description = $request->short_description;
        $book->price = $request->price;
        $book->category_id = $request->category_id;
        $image = $request->image;
        // dd($image);
        if($image!=null)
        {
            $name_image = time()."_".$image->getClientOriginalName();
            $path = $request->file('image')->storeAS(
                "public/uploads",$name_image
            );
            dd($path);
            // xoa anh cu
            // $image_old = explode("/",$book->image);
            // Storage::delete($image_old[1]."/".$image_old[2]);


            $book->image = "storage/uploads/".$name_image;
        }


        $book->save();
        return redirect()->route("book-admin.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->back();
    }
}
