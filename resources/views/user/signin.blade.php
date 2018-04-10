@extends('layouts.master')
  
@section('title')
Sign In - Alchemortem
@endsection
   
@section('content')
<div class="row">
    <div class="col-md-12 signUp">
        <h1>Sign In</h1>
        <p>Customers must be logged in to purchase items and view account. Please sign in here.</p>
        <p>Don't have an account? <a href="{{ route('signup') }}">Sign up </a></p>
    </div>
    <div class="col-md-6 col-sm-8 offset-md-3 offset-sm-2">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form action="{{ route('signin') }}" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Sign In</button>
            <a id="forgotPassword" href="{{ url('/password/reset') }}">Forgot password</a>
            {{ csrf_field() }}
        </form>
    </div>
</div>
@endsection