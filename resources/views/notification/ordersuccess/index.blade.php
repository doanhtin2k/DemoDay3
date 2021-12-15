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
                    <a  class="nav-item nav-link" href="{{route('cart.user')}}"><b>Giỏ Hàng</b> <span class="sr-only">(current)</span></a>
                    <a  class="nav-item nav-link" href="{{route('bill.history.user')}}"><b>History Bill</b> <span class="sr-only">(current)</span></a>

                </div>
            </div>
            <div class="alert alert-success alert-add-to-cart" role="alert">

            </div>
        </nav>
        <div>
            <h1>Bạn đã đặt thành công đơn hàng , với giá trị đơn hàng là {{$data['totalPrice']}}</h1>
            <a href="{{route("bill.history.details.user",[$data['id']])}}">Chi tiet don hang</a>
        </div>
    </div>
@endsection
