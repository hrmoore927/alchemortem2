@extends('layouts.master')

@section('title')
Alchemortem - My Account
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>My Account</h1>
        </div>
        <div class="col-lg-3 col-md-12 accountMenu">
            <ul class="nav flex-column">
                <li class="nav-item">
                        <a class="nav-link" href="{{ route('my-account')}}">Account Info</a>
                </li>
                @if(Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manage-users')}}">Show All Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manage-products')}}">Show All Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('add-product')}}">Add A Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manage-orders') }}">Show All Orders</a>
                    </li>
                @endif
                @if(Auth::user()->role == 'user')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user-orders') }}">Orders</a>
                    </li>
                @endif    
            </ul>
        </div>
        <div class="col-lg-9 col-md-12">
            @yield('account-content')
        </div>
    </div>
@endsection