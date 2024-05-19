@extends('user.layout.master')
@section('style')
    <style>
        .div_image {
            height: 300px;
            width: 300px;
            margin: auto;
            background-color: black;
            color: white;
            border: 4px solid black;
            border-radius: 5px;
            margin-top: 3px;
            text-align: center;
        }

        .container {
            text-align: center;
        }
    </style>
@endsection
@section('body')
    <div class="container">
        <div class="div_image">
            @foreach ($images as $image)
                <img src="{{asset($image->image)}}" alt="">
            @endforeach
        </div>
        <h4>{{ $product->name }}</h4>
        <h4>Price:{{ $product->price }}</h4>
        <h4>
            <p>about Product : {{ $product->description }}</p>
        </h4>
    </div>
@endsection
