@extends('user.layout.master')
@section('style')
    <style>
        .div_image {
            height: 1000px;
            width: 1000px;
        }

        .container {
            text-align: center;
        }
    </style>
@endsection
@section('body')
    <div class="container">
        <div class="image">
            <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    @foreach ($images as $key => $image)
                        <li data-target="#demo"
                            data-slide-to="{{ $key }}"@if ($key == 0) class="active" @endif></li>
                    @endforeach
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">

                    @foreach ($images as $key => $image)
                        <div
                            @if ($key != 1) class="carousel-item  " @else class="carousel-item  active" @endif>
                            <img src="{{ asset($image->image) }}" alt="Los Angeles">
                        </div>
                    @endforeach

                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>

            </div>

            <h4>{{ $product->name }}</h4>
            <h4>Price:{{ $product->price }}</h4>
            <h4>
                <p>about Product : {{ $product->description }}</p>
            </h4>

            <form action="cart/create" method="post">
                <input style="display: none" type="text" name="" id="" value="{{ $product->id }}">
                <button type="button" name="" id="" class="btn btn-primary btn-lg btn-block">Add To Cart</button>
            </form>
        </div>
    @endsection
