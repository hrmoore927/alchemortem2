@extends('layouts.master')

@section('title')
Forgot Password - Alchemortem
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 resetPassword">
            <h1>Reset Password</h1>
            <p>Forgotten your password? No problem. Enter the email address associated with your account to receive a link to the password reset form.</p>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-4">
            
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="form-horizontal" id="sendEmail" role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-12 control-label">E-Mail Address</label>
                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 offset-md-2">
                        <button type="submit" class="btn btn-success">Send Password Reset Link</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection