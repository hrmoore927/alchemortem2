@extends('layouts.master')

@section('title')
ADMIN - Manage Products - Alchemortem
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Image 1</th>
                    <th scope="col">Image 2</th>
                    <th scope="col">Image 3</th>
                    <th scope="col">Image 4</th>
                    <th scope="col">Description</th>
                    <th scope="col">Materials</th>
                    <th scope="col">Dimensions</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
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
                        <td>Edit</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection