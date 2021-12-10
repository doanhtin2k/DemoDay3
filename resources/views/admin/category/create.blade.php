@extends("layouts.admin")
@section("title")
Thêm mới danh mục
@endsection
@section("main")
@section("chu-de","Thêm mới category")
<form action="{{route('category-admin.store')}}" method="post">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" placeholder="tên danh mục" name="title">
    @if ($errors->has('title'))
         <small id="emailHelp" class="form-text text-muted"><b style="color:red">{{$errors->first("title")}}</b></small>
    @endif
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea class="form-control" placeholder="mô tả" name="description" rows="10"></textarea>
    @if ($errors->has('description'))
         <small id="emailHelp" class="form-text text-muted"><b style="color:red">{{$errors->first("description")}}</b></small>
    @endif
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection