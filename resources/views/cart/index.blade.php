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
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Book_id</th>
                    <th scope="col">Tên sách</th>
                    <th scope="col">Giá sách</th>
                    <th scope="col">số lượng</th>
                </tr>
                </thead>
                <tbody>
               @foreach($carts as $key => $cart)
                   <tr>
                       <th scope="row">{{$key}}</th>
                       <td>{{$cart['book']->name}}</td>
                       <td>{{$cart['book']->price}}</td>
                       <td>{{$cart['quantity']}}</td>
                   </tr>
               @endforeach
                </tbody>
            </table>
            <div class="alert alert-success" role="alert">
                Tổng tiền: {{$totalPrice}}
            </div>
            <div>
                <a href="{{route("bill.index.user")}}" class="btn btn-success">Thanh toán</a>
            </div>
        </div>

    </div>
@endsection
