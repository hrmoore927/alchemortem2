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
                            <label for="custName">Name</label>
                            <input type="text" id="custName" class="form-control" name="custName" required>
                        </div>
                        <div class="form-group">
                            <label for="shipLine1">Shipping Address Line 1</label>
                            <input type="text" id="shipLine1" class="form-control" name="shipLine1" required>
                        </div>
                        <div class="form-group">
                            <label for="shipLine2">Shipping Address Line 2 (Optional)</label>
                            <input type="text" id="shipLine2" class="form-control" name="shipLine2">
                        </div>
                        <div class="form-group">
                            <label for="shipCity">Shipping City</label>
                            <input type="text" id="shipCity" class="form-control" name="shipCity" required>
                        </div>
                        <div class="form-group">
                            <label for="shipState">Shipping State</label>
                            <input type="text" id="shipState" class="form-control" name="shipState" required>
                        </div>
                        <div class="form-group">
                            <label for="shipZip">Shipping Zip Code</label>
                            <input type="text" id="shipZip" class="form-control" name="shipZip" required>
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