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
    <a href="/admin/category/create">
<button class="btn btn-primary btn-block">Add Ctegories</button>
    </a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Edite</th>
      <th scope="col">DELETE</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
    <tr>
      <td><h4>{{$category->id}}</h4></td>
      <td><h4>{{$category->name}}</h4></td>
      <td><a href="/admin/category/update/{{$category->id}}"><button class="btn btn-info">Edite</button></a></td>
      <td><a href="/admin/category/delete/{{$category->id}}"><button class="btn btn-danger">DELETE</button></a></td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>
@endsection