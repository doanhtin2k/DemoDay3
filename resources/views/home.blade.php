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
            <div class="alert alert-success alert-add-to-cart" role="alert">

            </div>
        </nav>
    <div class="row">
        @foreach($books as $book)
            <div class="card col-md-4" style="width: 18rem;">
                <img class="card-img-top" src="{{asset($book->image)}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$book->name}}</h5>
                    <h5 class="card-title">Price: {{$book->price}}</h5>
                    <p class="card-text">{{$book->short_description}}</p>
                    <p class="card-text">Danh muc:{{$book->category->title}}</p>
                    <a  class="btn btn-primary active add-to-cart" data-id="{{$book->id}}">Add to cart</a>
                </div>
            </div>
        @endforeach
    </div>
    {!! $books->links() !!}
</div>
@endsection
