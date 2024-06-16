@extends('admin.layout.master')
@section('style')
<style>
    .table {
        text-align: center;
        margin: auto;
        margin-top: 10px
    }

    .btn-block {
        margin-top: 10px
    }
</style>
@endsection
@section('body')
<div class="container">
    <a href="/admin/product/create">
        <button class="btn btn-primary btn-block">Add Product</button>
    </a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Edite</th>
                <th scope="col">Category</th>
                <th scope="col">DELETE</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>
                    <h4>{{ $product->id }}</h4>
                </td>
                <td>
                    <h4>{{ $product->name }}</h4>
                </td>
                
                <td><a href="/admin/product/update/{{ $product->id }}"><button class="btn btn-info">Edite</button></a></td>
                <td>
                    <h4>
                        {{$product->cat_name}}
                    </h4>
                </td>
                <td><a href="/admin/product/delete/{{ $product->id }}"><button class="btn btn-danger">DELETE</button></a></td>
                <td><a href="/admin/product/image/{{$product->id}}"><button class="btn btn-light" type="submit">Images</button></a></td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection