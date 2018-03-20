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
                            <td id="quantity">{{ $product['qty'] }}</td>
                            <td>${{ $product['price'] }}</td>
                            <td><ul>
                                <li><a href="{{ route('reduce', [
                                'id' => $product['item']['id']
                            ]) }}">Reduce by one</a></li>
                                <li><a href="{{ route('increase', [
                                'id' => $product['item']['id']
                            ]) }}">Increase by one</a></li>
                                <li><a href="{{ route('remove', [
                                'id' => $product['item']['id']
                            ]) }}">Remove item</a></li>
                            </ul>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 offset-sm-9 col-md-6 offset-md-11">
                <strong class="bold">Total: ${{ $totalPrice }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 offset-sm-9 col-md-6 offset-md-11">
                <a href="{{ route('checkout') }}" class="btn btn-success">Checkout</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h1>No items in cart</h1>
                <p>What are you waiting for? Checkout out some of <a href="{{ route('shop.products') }}">these awesome items!</a></p>
            </div>
        </div>
    @endif

@endsection