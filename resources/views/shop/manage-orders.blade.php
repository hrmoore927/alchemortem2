@extends('layouts.master')

@section('title')
ADMIN - Manage Orders - Alchemortem
@endsection

@section('content')
<h1>Manage Orders</h1>
@foreach($orders as $order)
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="list-group">
                    @foreach($order->cart->items as $item)
                    <li class="list-group-item">
                        {{ $item['item']['productName'] }} | Qty: {{ $item['qty'] }}
                        <span class="badge badge-secondary">${{ $item['price'] }}</span>
                    </li>
                    @endforeach
                </ul> 
            </div>
            <div class="panel-footer">
                <strong>Total Price: ${{ $order->cart->totalPrice }}</strong>
            </div>
        </div>
    @endforeach
@endsection