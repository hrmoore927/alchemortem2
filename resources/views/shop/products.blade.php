@extends('layouts.master')

@section('title')
Shop Our Products - Alchemortem
@endsection

@section('content')
    <div class="row productList">
        <div class="col-md-12 col-sm-12">
            <h1>Available Items</h1>
            <p>All items are handmade one-of-a-kind products. When ordering multiple quanities of the same item, please allow for time of production during the shipping process.</p>
            <p>Click the item for more details.</p>
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <form action="/shop-products/search" method="post" class="form-inline" id="search">
            {{ csrf_field() }}
            <input class="form-control searchInput" type="text" name="queryString" id="query" placeholder="Search Products" aria-label="Search">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
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