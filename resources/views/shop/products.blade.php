@extends('layouts.master')

@section('title')
Shop Our Products - Alchemortem
@endsection

@section('content')
    <div class="row productList">
        <div class="col-md-12">
            <h1>Products</h1>
            <p>Click the item for more details.</p> 
        </div>
        @foreach($products as $product)
        <div class="col-md-6 col-lg-4 col-xl-3 col-sm-6 col-xs-12 products">
            <div class="card">
                <a href="{{ route('show.product', ['id' => $product->id]) }}"><img class="card-img-top" src="{{ $product->image1 }}" alt="product image"></a>
                <div class="card-body">
                    <h5 class="card-title">{{ $product->productName }}</h5>
                    <p class="price">${{ $product->price }} <a href="{{ route('add-to-cart', ['id' => $product->id]) }}" class="btn add">Add to cart</a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection