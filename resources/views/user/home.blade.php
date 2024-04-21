@extends('user.layout.master')
@section('style')
<style>
    .cont_home{
        text-align: center;
        margin-top:10px ;
        
    }

</style>
@endsection
@section('body')
<div class="container cont_home">
    <div class="row">
        @foreach($categories as $category)
        <div class="col-md-6">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h4 class="card-title">{{$category->name}}</h4>
                    <button class="btn btn-info btn-block"><a href="/products/{{$category->id}}" class="text-white">Show</a></button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection