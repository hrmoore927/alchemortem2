@extends('layouts.account')

@section('title')
ADMIN - Manage Orders - Alchemortem
@endsection

@section('account-content')
<h2>ADMIN - Manage Orders</h2>
@if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div><br />
@endif
@foreach($orders as $order)
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="list-group">
                    Order #: {{ $order->id }} | Status: {{ $order->orderStatus }}
                    <form action="{{ action('ProductController@updateOrderStatus', $order->id) }}" method="post" id="updateOrderStatus">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="form-group">
                            Update Order Status
                            <select name="orderStatus" id="orderStatus" form="updateOrderStatus">
                                <option value="paid">Paid</option>
                                <option value="shipped">Shipped</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        
                    </form>
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