@extends('admin.layout.master')
@section('style')
<style>
    .col-admin{
        margin:auto;
        margin-top:10px;
        text-align:center;
    }
</style>
@endsection
@section('body')
<div class="container">
    <div class="row">
    <div class="col-md-6 col-admin">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h4 class="card-title">Manage Products</h4>
                    <button class="btn btn-info btn-block"><a href="/admin/product/" class="text-white">Show Table</a></button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-md-6 col-admin">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h4 class="card-title">Manage categories</h4>
                    <button class="btn btn-info btn-block"><a href="/admin/category/" class="text-white">Show Table</a></button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-md-6 col-admin">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h4 class="card-title">Manage users</h4>
                    <button class="btn btn-info btn-block"><a href="/admin/users/" class="text-white">Show Table</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection