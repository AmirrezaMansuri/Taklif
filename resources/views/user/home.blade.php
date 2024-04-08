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
        @foreach($cats as $cat)
        <div class="col-md-6">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h4 class="card-title">{{$cat->name}}</h4>
                    <button class="btn btn-info btn-block"><a href="/products/{{$cat->id}}" class="text-white">Show</a></button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection