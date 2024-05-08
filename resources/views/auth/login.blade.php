@extends('admin.layout.master')
@section('style')
    <style>
        form {
            margin-top: 40px;
            margin: auto;
            width: 30%;
        }

        .form-group {
            margin-top: 20px;

        }
    </style>
@endsection
@section('body')
    <div class="container">
        <form action="/auth/login" method="post" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <h6>{{ $error }}</h6>
                @endforeach
            @endif
            <div class="form-group">
                <label for="user_name">
                    <h6>User Name:</h6>
                </label>
                <input type="text" class="form-control" name="name" id="user_name" aria-describedby="helpId"
                    placeholder="">
            </div>
            <div class="form-group">
                <label for="pass">
                    <h6>Password:</h6>
                </label>
                <input type="password" class="form-control" name="password" id="pass" aria-describedby="helpId"
                    placeholder="">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Create</button>
        </form>
    </div>
@endsection
