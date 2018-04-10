@extends('layouts.master')

@section('title')
Successful Checkout - Alchemortem
@endsection

@section('content')
<h1>Thank you for your order!</h1>
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
@endsection