@extends('layout.master')

@section('title')
Alchemortem - Shop Our Products
@endsection

@section('content')
    <h1>Products</h1>
    @foreach($products->chunk(3) as $productChunk)
    <div class="row">
        @foreach($productChunk as $product)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
<!--                <img src="{{ $product->id_image }}" alt="..." class="img-responsive">-->
                <div class="caption">
                    <h3>{{ $product->productName }}</h3>
                    <p class="description">{{ $product->description }}</p>
                    <div class="clearfix">
<!--
                        <div class="pull-left price">${{ $product->price }}</div>
                        <a href="{{ route('product.addToCart', ['id' => $product->id_product]) }}" class="btn btn-success pull-right" role="button">Add to cart</a>
-->
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endforeach
@endsection