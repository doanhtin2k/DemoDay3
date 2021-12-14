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
                </div>
            </div>
        </nav>
        <div>
            <h1 style="text-align: Center; color:green">Thanh toán</h1>
            <div>
                <form action="{{route("bill.create.user")}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ người nhận</label>
                        <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số điện thoại</label>
                        <input type="text" name="numberPhone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <h2>Tổng số sản phẩm: {{$totalItem}}</h2>
                    <button type="submit" class="btn btn-primary">Access</button>
                </form>
            </div>
        </div>

    </div>
@endsection
