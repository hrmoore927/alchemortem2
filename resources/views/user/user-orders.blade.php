@extends('layouts.account')

@section('account-content')
    <h2>My Orders</h2>
    @if(count($orders) >= 1)
        @foreach($orders as $order)
            <div class="panel panel-default">
                <div class="panel-body">
                    <p><span class="bold">Order Status:</span> {{ $order->orderStatus }}</p>
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
    @else
        <p>No orders have been made.</p>
    @endif
@endsection