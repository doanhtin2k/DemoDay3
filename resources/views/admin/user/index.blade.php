@extends("layouts.admin")
@section("title")
Danh sách User
@endsection
@section("main")
@section("chu-de","Danh sach User")
<button type="button" class="btn btn-success" style="margin-bottom:20px"><a href="{{route('book-admin.create')}}" style="color:white"> Thêm mới book</a></button>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col" >#</th>
      <th scope="col" >username</th>
      <th scope="col" >email</th>
      <th scope="col" >password</th>
      <th scope="col" >action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->username}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->password}}</td>
      <td>
          <form action="{{route('user-admin.destroy',[$user->id])}}" method="POST" >
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
{!! $users->links() !!}
</div>
@endsection