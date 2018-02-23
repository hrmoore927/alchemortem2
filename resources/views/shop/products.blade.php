@extends('layouts.master')

@section('title')
    Alchemortem - Shop Our Products
@endsection

@section('content')
    <h1>Products</h1>
    <div class="row productList">
        @foreach($products as $product)
        <div class="col-md-6 col-lg-4 col-xl-3 col-sm-6 col-xs-12 products">
            <div class="card">
                <img class="card-img-top" src="{{ $product->image }}" alt="product image">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->productName }}</h5>
<!--                    <p class="card-text">{{ $product->description }}</p>-->
                    <p class="price">${{ $product->price }} <a href="#" class="btn add">Add to cart</a></p>
                    
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection