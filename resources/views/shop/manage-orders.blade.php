@extends('layouts.account')

@section('title')
ADMIN - Manage Orders - Alchemortem
@endsection

@section('account-content')
<h2>ADMIN - Manage Orders</h2>
@foreach($orders as $order)
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="list-group">
                    Order #: {{ $order->order_id }} | Status: {{ $order->orderStatus }}
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