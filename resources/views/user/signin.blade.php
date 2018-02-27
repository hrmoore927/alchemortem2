@extends('layouts.master')
  
@section('title')
Alchemortem - Sign In
@endsection
   
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Sign In</h1>
        <p>Customers must be logged in to purchase items and view account. Please sign in here.</p>
    </div>
    <div class="col-md-4 col-sm-12 .offset-md-4 signup">
        @if(count($errors) > 0)
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
            <button type="submit" class="btn btn-primary">Sign Up</button>
            {{ csrf_field() }}
        </form>
    </div>
</div>
@endsection