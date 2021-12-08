@extends("layouts.admin")
@section("title")
Danh sách sách
@endsection
@section("main")
@section("chu-de","Danh sach Book")
<button type="button" class="btn btn-success" style="margin-bottom:20px"><a href="{{route('category-admin.create')}}" style="color:white"> Thêm mới book</a></button>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">id</th>
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

  
  </tbody>
</table>
<div>
    {!! $books->links() !!}
</div>
@endsection