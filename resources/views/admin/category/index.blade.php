@extends("layouts.admin")
@section("title")
Danh sách danh mục
@endsection
@section("main")
@section("chu-de","Danh sach category")
<button type="button" class="btn btn-success" style="margin-bottom:20px"><a href="{{route('category-admin.create')}}" style="color:white"> Thêm mới Category</a></button>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">created_at</th>
      <th scope="col">updated_at</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($categories as $category)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td>{{$category->title}}</td>
      <td>{{$category->description}}</td>
      <td>{{$category->created_at}}</td>
      <td>{{$category->updated_at}}</td>
      <td>
          <a href="{{route('category-admin.edit',[$category->id])}}" class="btn btn-warning" style="display:block ; width:80px" >Edit</a>
          <form action="{{route('category-admin.destroy',[$category->id])}}" method="POST" >
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm mb-2" onclick="return confirm('ban chac chan muon xoa')" style="margin-top:10px ; width:80px;display:block">
                                    Delete
                            </button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div>
    {!! $categories->links() !!}
</div>
@endsection