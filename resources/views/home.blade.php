@extends('layouts.app')

@section('content')
<div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                @foreach($cates as $cate)
            <a class="nav-item nav-link active" href="#"><b>{{$cate->title}}</b> <span class="sr-only">(current)</span></a>
                @endforeach
            </div>
        </div>
        </nav>
    <div class="row">
        @foreach($books as $book)
            <div class="card col-md-4" style="width: 18rem;">
                <img class="card-img-top" src="{{asset($book->image)}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$book->name}}</h5>
                    <p class="card-text">{{$book->short_description}}</p>
                    <p class="card-text">Danh muc:{{$book->category->title}}</p>
                    <a href="#" class="btn btn-primary">order</a>
                </div>
            </div>
        @endforeach
    </div>
    {!! $books->links() !!}
</div>
@endsection
