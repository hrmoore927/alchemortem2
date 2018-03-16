@extends('layouts.master')
  
@section('title')
Sign Up - Alchemortem
@endsection
   
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Sign Up</h1>
        <p>Customers must be logged in to purchase items. Don't have an account? No problem, you can sign up here!</p>
        <p>Already have an account? Sign in <a href="{{ route('signin') }}">here</a>.</p>
    </div>
    <div class="col-md-4 col-sm-12 .offset-md-4 signup">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form action="{{ route('signup') }}" method="post">
            <div class="form-group">
                <label for="fName">First Name:</label>
                <input type="text" id="fName" name="fName" class="form-control">
            </div>
            <div class="form-group">
                <label for="lName">Last Name:</label>
                <input type="text" id="lName" name="lName" class="form-control">
            </div>
<!--
            <div class="form-group">
                <label for="shipLine1">Shipping Address Line 1:</label>
                <input type="text" id="shipLine1" name="shipLine1" class="form-control">
            </div>
            <div class="form-group">
                <label for="shipLine2">Shipping Address Line 2:</label>
                <input type="text" id="shipLine2" name="shipLine2" class="form-control">
            </div>
            <div class="form-group">
                <label for="shipCity">Shipping City:</label>
                <input type="text" id="shipCity" name="shipCity" class="form-control">
            </div>
            <div class="form-group">
                <label for="shipState">Shipping State:</label>
                <input type="text" id="shipState" name="shipState" class="form-control">
            </div>
            <div class="form-group">
                <label for="shipZip">Shipping Zip Code:</label>
                <input type="text" id="shipZip" name="shipZip" class="form-control">
            </div>
-->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
            {{ csrf_field() }}
        </form>
    </div>
</div>
@endsection