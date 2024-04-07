@extends('user.layout.master')
@section('style')
<style>
    .cont_cat{
        text-align: center;
        margin-top: 10px;
    };
</style>
@endsection
@section('body')
<div class="container cont_cat">
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4" style="margin-top: 4px;">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h4 class="card-title">{{$product->name}}</h4>
                    <button class="btn btn-info btn-block"><a href="/product/{{$product->id}}" class="text-white">Show Product</a></button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection