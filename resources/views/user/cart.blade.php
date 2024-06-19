@extends('user.layout.master');

@section('style')
@endsection

@section('body')
    <div class="container">
        <h3>Your Card</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>off</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart_products as $product)
                    <tr>
                        <td>
                            <h6>
                                {{ $product->product->name }}
                            </h6>
                        </td>
                        <td>
                            <h6>
                                {{ $product->product->price }}
                            </h6>
                        </td>
                        <td>
                            <h6>
                                {{ $product->product->off }}
                            </h6>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href=""></a>
    </div>
    </div>
@endsection
