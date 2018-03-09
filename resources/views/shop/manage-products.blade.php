@extends('layouts.master')

@section('title')
ADMIN - Manage Products - Alchemortem
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
       <h1>ADMIN - Manage Products</h1>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                Session::forget('success');
                @endphp
            </div>
        @endif
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Image 1</th>
                    <th>Image 2</th>
                    <th>Image 3</th>
                    <th>Image 4</th>
                    <th>Description</th>
                    <th>Materials</th>
                    <th>Dimensions</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->productName }}</td>
                        <td class="managePhotos"><img src="{{ $product->image1 }}" alt="product image"></td>
                        <td class="managePhotos"><img src="{{ $product->image2 }}" alt="product image"></td>
                        <td class="managePhotos"><img src="{{ $product->image3 }}"></td>
                        <td class="managePhotos"><img src="{{ $product->image4 }}"></td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->materials }}</td>
                        <td>{{ $product->dimensions }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->status }}</td>
                        <td><a class="btn btn-primary" href="{{ route('edit-product', $product->id) }}">Edit</a></td>
                        <td><a class="btn btn-danger" href="{{ route('delete-product', $product->id) }}">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection