@extends('layouts.account')

@section('title')
ADMIN - Manage Orders - Alchemortem
@endsection

@section('account-content')
<h2>ADMIN - Manage Orders</h2>
<div class="col-md-10">
@if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div><br />
@endif
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
@foreach($orders as $order)
        <div class="panel panel-default">
            <div class="panel-body allOrders">
                <p><span class="bold">Order #:</span> {{ $order->id }} | <span class="bold">Status:</span> {{ $order->orderStatus }}</p>
                <p><span class="bold">Order Date: </span>{{ $order->orderDate }}</p>
                <p><span class="bold">Customer:</span> {{ $order->custName}} | <span class="bold">Customer ID:</span> {{ $order->user_id }}</p>
                <p><span class="bold">Shipping Address:</span> {{ $order->shipLine1}} {{ $order->shipLine2 }} {{ $order->shipCity }}, {{ $order->shipState }} {{ $order->shipZip }}</p>
                <form action="{{ action('ProductController@updateOrderStatus', $order->id) }}" method="post" class="updateOrderStatus">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="form-group">
                            Update Order Status
                            <select name="orderStatus" class="orderStatus">
                                <option value="paid">Paid</option>
                                <option value="shipped">Shipped</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        
                    </form>
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
                <strong class="bold">Total Price: ${{ $order->cart->totalPrice }}</strong>
            </div>
        </div>
    @endforeach
</div>
@endsection