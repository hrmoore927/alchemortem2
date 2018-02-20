@extends('layouts.master')

@section('title')
    Alchemortem - Shop Our Products
@endsection

@section('content')
    <h1>Products</h1>
    @foreach($products->chunk(3) as $productChunk)
    <div class="row">
        @foreach($productChunk as $product)
        <div class="col-sm-6 col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ $product->image1 }}" alt="product image">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->productName }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
@endsection