@extends('layouts.master')
  
@section('title')
Sign Up - Alchemortem
@endsection
   
@section('content')
<div class="row">
    <div class="col-md-12 signUp">
        <h1>Sign Up</h1>
        <p>Customers must be logged in to purchase items. Don't have an account? No problem, you can sign up here!</p>
        <p>Already have an account? <a href="{{ route('signin') }}">Sign in</a></p>
    </div>
    <div class="col-md-4 col-sm-12 offset-md-4">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form action="{{ route('signup') }}" method="post">
            <div class="form-group">
                <label for="fName">First Name:</label>
                <input type="text" id="fName" name="fName" class="form-control" value="{{ old('fName') }}">
            </div>
            <div class="form-group">
                <label for="lName">Last Name:</label>
                <input type="text" id="lName" name="lName" class="form-control" value="{{ old('lName') }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
            {{ csrf_field() }}
        </form>
    </div>
</div>
@endsection