@extends("layouts.admin")
@section("title")
Thêm mới Book
@endsection
@section("main")
@section("chu-de","Thêm mới Book")
<form action="{{route('book-admin.store')}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" placeholder="tên sách" name="name">
    @if ($errors->has('name'))
         <small id="emailHelp" class="form-text text-muted"><b style="color:red">{{$errors->first("name")}}</b></small>
    @endif
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">short Description</label>
    <textarea class="form-control" placeholder="mô tả" name="short_description" rows="5"></textarea>
    @if ($errors->has('short_description'))
         <small id="emailHelp" class="form-text text-muted"><b style="color:red">{{$errors->first("short_description")}}</b></small>
    @endif
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Image</label>
    <input type="file" class="form-control" name="image">
    @if ($errors->has('image'))
         <small id="emailHelp" class="form-text text-muted" ><b style="color:red">{{$errors->first("image")}}</b></small>
    @endif
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input type="text" class="form-control" name="price">
    @if ($errors->has('price'))
         <small id="emailHelp" class="form-text text-muted"><b style="color:red">{{$errors->first("price")}}</b></small>
    @endif
  </div>
  <div class="form-group">
        <label for="category_id">Chọn danh mục</label>
        <select name="category_id" class="form-control" id="category_id" >
            @foreach ($cate as $key => $item)
                <option value="{{$item->id}}"
                    >{{$item->title}}</option>
            @endforeach
        </select>
    </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection