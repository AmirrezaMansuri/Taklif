@extends('admin.layout.master')
@section('style')
<style>
    form{
        margin-top: 40px;
        margin: auto;
        width: 30%;
    }
    .form-group{
        margin-top: 20px;
        
        }
</style>
@endsection
@section('body')
<div class="container">
    <form action="/admin/category/update/{{$category->id}}" method="post">
        @csrf
        <div class="form-group">
          <label for="category"><h6>Category Name:</h6></label>
          <input type="text"
            class="form-control" value="{{$category->name}}" name="name" id="category" aria-describedby="helpId" placeholder="">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Create</button>
    </form>
</div>
@endsection