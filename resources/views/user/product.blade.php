@extends('user.layout.master')
@section('style')
    <style>
        .div_image {
            height: 900px;
            width: 100px;
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

                    @foreach ($images as $image)
                        <li data-target="#demo" data-slide-to=""></li>
                    @endforeach
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    @foreach ($images as $image)
                        <div class="carousel-item">
                            <img src="{{ asset($image->image) }}" alt="">
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
        </div>

        <h4>{{ $product->name }}</h4>
        <h4>Price:{{ $product->price }}</h4>
        <h4>
            <p>about Product : {{ $product->description }}</p>
        </h4>
    </div>
@endsection
