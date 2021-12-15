@extends('layouts.app')

@section('content')
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{route('home')}}">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    @foreach($cates as $cate)
                        <a class="nav-item nav-link active" href="{{route('category.user',[$cate->title])}}"><b>{{$cate->title}}</b> <span class="sr-only">(current)</span></a>
                    @endforeach
                    <a class="nav-item nav-link active" href="{{route('cart.user')}}"><b>Giỏ Hàng</b> <span class="sr-only">(current)</span></a>
                    <a  class="nav-item nav-link" href="{{route('bill.history.user')}}"><b>History Bill</b> <span class="sr-only">(current)</span></a>
                </div>
            </div>
        </nav>
        <div>
            <h1 style="text-align: Center; color:green">Chi tiet hoa don</h1>
            <div>
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">short description</th>
                        <th scope="col">image</th>
                        <th scope="col">price</th>
                        <th scope="col">category</th>
                        <td>Quantity</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <th scope="row">{{$book->id}}</th>
                            <td>{{$book->name}}</td>
                            <td>{{$book->short_description}}</td>
                            <td><img src="{{asset($book->image)}}" style="width:80px"/></td>
                            <td>{{$book->price}}</td>
                            <td>{{$book->category->title}}</td>
                            <td>{{$book->pivot->quantity}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <p>Total Item: {{$bill->totalItem}}</p>
                <p>Total Price: {{$bill->totalPrice}}</p>
            </div>
        </div>

    </div>
@endsection
