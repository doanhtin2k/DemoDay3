@extends("layouts.admin")
@section("title")
Sửa danh mục
@endsection
@section("main")
@section("chu-de","Sửa danh mục")
<form action="{{route('category-admin.update',[$category->id])}}" method="post">
    @method('PUT')
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" placeholder="tên danh mục" name="title" value="{{$category->title}}">
    @if ($errors->has('title'))
         <small id="emailHelp" class="form-text text-muted"><b style="color:red">{{$errors->first("title")}}</b></small>
    @endif
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea class="form-control" placeholder="mô tả" name="description" rows="10">{{$category->description}}</textarea>
    @if ($errors->has('description'))
         <small id="emailHelp" class="form-text text-muted"><b style="color:red">{{$errors->first("description")}}</b></small>
    @endif
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection