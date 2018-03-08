@extends('layouts.master')

@section('title')
Checkout - Alchemortem
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Checkout</h1>
        </div>
        <div class="col-md-6 col-sm-6">
            <h3>Your total: ${{ $total }}</h3>
            <form action="{{ route('checkout') }}" method="post">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" required>
                        </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-name">Card Holder Name</label>
                            <input type="text" id="card-name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-number">Card Number</label>
                            <input type="text" id="card-number" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="expiration-month">Expiration Month</label>
                                    <input type="text" id="expiration-month" class="form-control"     required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="expiration-year">Expiration Year</label>
                                    <input type="text" id="expiration-year" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-cvc">CVC</label>
                            <input type="text" id="card-cvc" class="form-control" required>
                        </div>
                    </div>
                </div>
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success">Submit Payment</button>
            </form>
        </div>
    </div>
@endsection