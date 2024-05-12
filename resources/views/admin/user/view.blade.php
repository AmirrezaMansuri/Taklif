@extends('admin.layout.master');
@section('style')
 <style>
     .table{
         text-align:center;
         margin:auto;
         margin-top:10px
     }
     .btn-block{
        margin-top:10px
     }
 </style>
@endsection
@section('body')
<div class="container">
    <a href="/admin/user/create">
<button class="btn btn-primary btn-block">Add User</button>
</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Edite</th>
      <th scope="col">DELETE</th>
      <th scope="col">Status</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <td><h4>{{$user->id}}</h4></td>
      <td><h4>{{$user->name}}</h4></td>
      <td><a href="/admin/user/update/{{$user->id}}"><button class="btn btn-info">Edite</button></a></td>
      <td><a href="/admin/user/delete/{{$user->id}}"><button class="btn btn-danger">DELETE</button></a></td>
      <td><a href="/admin/user"><button class="btn" type="submit">Active</button></a></td>
      <td><a href="/admin/user/image/{{$user->id}}"><button class="btn btn-light" type="submit">Images</button></a></td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>
@endsection