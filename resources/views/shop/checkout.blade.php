@extends('layouts.master')

@section('title')
Checkout - Alchemortem
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Checkout</h1>
        </div>
        <div class="col-md-6 offset-md-3 col-sm-6">
            <h3>Your total: ${{ $total }}</h3>
            <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="line1">Shipping Address Line 1</label>
                            <input type="text" id="line1" class="form-control" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="line2">Shipping Address Line 2 (Optional)</label>
                            <input type="text" id="line2" class="form-control" name="line2">
                        </div>
                        <div class="form-group">
                            <label for="city">Shipping City</label>
                            <input type="text" id="city" class="form-control" name="city" required>
                        </div>
                        <div class="form-group">
                            <label for="state">Shipping State</label>
                            <input type="text" id="state" class="form-control" name="state" required>
                        </div>
                        <div class="form-group">
                            <label for="zip">Shipping Zip Code</label>
                            <input type="text" id="zip" class="form-control" name="zip" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" id="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="card-element">Credit or debit card</label>
                        <div id="card-element">
                          <!-- A Stripe Element will be inserted here. -->
                        </div>
                        
                        <!-- Used to display Element errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success">Submit Payment</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ URL::to('js/checkout.js') }}"></script>
@endsection