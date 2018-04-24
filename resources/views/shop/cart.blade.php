@extends('layouts.master')

@section('title')
Cart - Alchemortem
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-md-12">
                <h1>Cart</h1>
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                          <th scope="col">Product</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Price</th>
                          <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product['item']['productName'] }}</td>
                            <td id="quantity">{{ $product['qty'] }}</td>
                            <td>${{ $product['price'] }}</td>
                            <td><ul>
                                <li class="cartQty"><a href="{{ route('reduce', [
                                'id' => $product['item']['id']
                            ]) }}">Reduce by one</a></li>
                                <li class="cartQty"><a href="{{ route('increase', [
                                'id' => $product['item']['id']
                            ]) }}">Increase by one</a></li>
                                <li class="cartQty"><a href="{{ route('remove', [
                                'id' => $product['item']['id']
                            ]) }}">Remove item</a></li>
                            </ul>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="offset-lg-10 col-md-6 offset-md-9">
                <strong class="bold">Total: ${{ $totalPrice }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="offset-lg-10 col-md-6 offset-md-9">
                <a href="{{ route('checkout') }}" class="btn btn-success">Checkout</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h1>No items in cart</h1>
                <p>What are you waiting for? Checkout out some of these <a href="{{ route('shop.products') }}">awesome items!</a></p>
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
<!--                <h2>You might like these items:</h2>-->
                
            </div>
        </div>
    @endif

@endsection