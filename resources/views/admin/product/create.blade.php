@extends('admin.layout.master')
@section('style')
<style>
    form {
        margin-top: 40px;
        margin: auto;
        width: 30%;
    }

    .form-group {
        margin-top: 10px;

    }
</style>
@endsection
@section('body')
<div class="container">
    <form action="/admin/product/create" method="post">
        @csrf
        <div class="form-group">
            <label for="Product">
                <h6>Product Name :</h6>
            </label>
            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
            <label for="price">
                <h6>Price :</h6>
            </label>
            <input type="text" class="form-control" name="price" id="price" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
            <label for="off">
                <h6>OFF :</h6>
            </label>
            <input type="text" class="form-control" name="off" id="off" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for=""><h6>Lorem :</h6></label>
          <textarea class="form-control" name="description" id="description" rows="3">Lorem</textarea>
        </div>
        <div class="form-group">
            <label for="cat"><h6>Category :</h6></label>
            <select class="form-control" name="category_id" id="cat">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Create</button>
    </form>
</div>
@endsection