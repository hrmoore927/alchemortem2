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
                            <input type="text" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" class="form-control" required>
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