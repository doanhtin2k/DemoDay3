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
            <h1 style="text-align: Center; color:green">Lịch sử mua hàng</h1>
            <div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">username</th>
                        <th scope="col">address</th>
                        <th scope="col">numberPhone</th>
                        <th scope="col">totalItem</th>
                        <th scope="col">Xem Chi tiết</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bills AS $bill)
                    <tr>
                        <th scope="row">{{$bill->id}}</th>
                        <td>{{$bill->user->username}}</td>
                        <td>{{$bill->address}}</td>
                        <td>{{$bill->numberphone}}</td>
                        <td>{{$bill->totalItem}}</td>
                        <td>
                            <a href="{{route('bill.history.details.user',[$bill->id])}}" class="btn btn-success">Details</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
