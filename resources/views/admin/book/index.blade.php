@extends("layouts.admin")
@section("title")
Danh sách sách
@endsection
@section("main")
@section("chu-de","Danh sach Book")
<button type="button" class="btn btn-success" style="margin-bottom:20px"><a href="{{route('book-admin.create')}}" style="color:white"> Thêm mới book</a></button>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">short description</th>
      <th scope="col">image</th>
      <th scope="col">price</th>
      <th scope="col">category</th>
      <th scope="col">created_at</th>
      <th scope="col">updated_at</th>
      <th scope="col">action</th>
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
      <td>{{$book->created_at}}</td>
      <td>{{$book->updated_at}}</td>
      <td>
      </td>
    </tr>
    @endforeach
  
  </tbody>
</table>
<div>
    {!! $books->links() !!}
</div>
@endsection