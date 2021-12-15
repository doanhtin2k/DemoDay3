@extends("layouts.admin")
@section("title")
    Danh sách hóa đơn
@endsection
@section("main")
@section("chu-de","Danh sach Book")
<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">address</th>
        <th scope="col">numberPhone</th>
        <th scope="col">ususername</th>
        <th scope="col">totalPrice</th>
        <th scope="col">created_at</th>
        <th scope="col">updated_at</th>
        <th scope="col">action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($bills as $bill)
        <tr>
            <th scope="row">{{$bill->id}}</th>
            <td>{{$bill->address}}</td>
            <td>{{$bill->numberphone}}</td>
            <td>{{$bill->user->username}}</td>
            <td>{{$bill->totalPrice}}</td>
            <td>{{$bill->created_at}}</td>
            <td>{{$bill->updated_at}}</td>
            <td>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
<div>
    {!! $bills->links() !!}
</div>
@endsection
