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
    <form action="/admin/user/update/{{$user->id}}" method="post">
        @csrf
        <div class="form-group">
            <label for="user_name">
                <h6>User Name:</h6>
            </label>
            <input value="{{$user->name}}" type="text" class="form-control" name="name" id="user_name" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="email"><h6>Email:</h6></label>
          <input value="{{$user->email}}" type="email"
            class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="pass"><h6>Password:</h6></label>
          <input value="{{$user->password}}" type="password"
            class="form-control" name="password" id="pass" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="newpass"><h6>New Password:</h6></label>
          <input type="password"
            class="form-control" name="newpassword" id="newpass" aria-describedby="helpId" placeholder="">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Create</button>
    </form>
</div>
@endsection
