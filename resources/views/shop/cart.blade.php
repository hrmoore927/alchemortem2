@extends('layouts.master')

@section('title')
Cart - Alchemortem
@endsection

@section('content')
    @if(Session::has('cart))
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                          <th scope="col">Product</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                          <td>{{ $product['item']['title'] }}</td>
                          <td>{{ $product['qty'] }}</td>
                          <td>{{ $product['price'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
    <div class="row">
        <div class="col-md-12">
            <h2>No items in cart.</h2>
        </div>
    </div>
    @endif

@endsection