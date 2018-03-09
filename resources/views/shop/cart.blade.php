@extends('layouts.master')

@section('title')
Cart - Alchemortem
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-12">
                <h1>Cart</h1>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                          <th scope="col">Product Name</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Price</th>
                          <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product['item']['productName'] }}</td>
                            <td>{{ $product['qty'] }}</td>
                            <td>{{ $product['price'] }}</td>
                            <td>Action</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 offset-sm-9 col-md-6 offset-md-11">
                <strong>Total: ${{ $totalPrice }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 offset-sm-9 col-md-6 offset-md-11">
                <a href="{{ route('checkout') }}" class="btn btn-success" type="button">Checkout</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h2>No items in cart</h2>
            </div>
        </div>
    @endif

@endsection