@extends("layouts.admin")
@section("title")
Sửa Book
@endsection
@section("main")
@section("chu-de","Sửa Book")
<form action="{{route('book-admin.update',[$book->id])}}" method="post" enctype="multipart/form-data">
  @method("PUT")
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" placeholder="tên sách" name="name" value="{{$book->name}}">
    @if ($errors->has('name'))
         <small id="emailHelp" class="form-text text-muted"><b style="color:red">{{$errors->first("name")}}</b></small>
    @endif
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">short Description</label>
    <textarea class="form-control" placeholder="mô tả" name="short_description" rows="5">{{$book->short_description}}</textarea>
    @if ($errors->has('short_description'))
         <small id="emailHelp" class="form-text text-muted"><b style="color:red">{{$errors->first("short_description")}}</b></small>
    @endif
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Image</label>
    <input type="file" class="form-control" name="image">
    <td><img src="{{asset($book->image)}}" style="width:80px"/></td>
    @if ($errors->has('image'))
         <small id="emailHelp" class="form-text text-muted"><b style="color:red">{{$errors->first("image")}}</b></small>
    @endif
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input type="text" class="form-control" name="price" value="{{$book->price}}">
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