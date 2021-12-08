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
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">short Description</label>
    <textarea class="form-control" placeholder="mô tả" name="short_description" rows="5"></textarea>
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Image</label>
    <input type="file" class="form-control" name="image">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input type="text" class="form-control" name="price">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
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