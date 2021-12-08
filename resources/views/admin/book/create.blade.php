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
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea class="form-control" placeholder="mô tả" name="description" rows="10"></textarea>
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection