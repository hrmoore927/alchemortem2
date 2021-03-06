@extends('layouts.master')

@section('title')
{{ $product->productName }} - Alchemortem
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>{{ $product->productName }}</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-6 singleItem">
        <a href="{{ $product->image1 }}"><img src="{{ $product->image1 }}" alt="product image 1"></a>
        <a href="{{ $product->image2 }}"><img src="{{ $product->image2 }}" alt="product image 2"></a>
        @if(! empty($product->image3))
            <a href="{{ $product->image3 }}"><img src="{{ $product->image3 }}" alt="product image 3"></a>
        @endif
        @if(! empty($product->image4))
            <a href="{{ $product->image4 }}"><img src="{{ $product->image4 }}" alt="product image 4"></a>
        @endif
    </div>
    <div class="col-md-6 itemInfo">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <p>{{ $product->description }}</p>
        <p class="bold">Materials:</p>
        <p>{{ $product->materials }}</p>
        <p class="bold">Dimensions:</p>
        <p>{{ $product->dimensions }}</p>
        <p class="bold">${{ $product->price }}</p>
        <a class="btn btn-primary" id="addToCart" href="{{ route('add-to-cart', ['id' => $product->id]) }}">Add to cart</a>
    </div>
</div>
@endsection