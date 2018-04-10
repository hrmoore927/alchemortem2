@extends('layouts.master')

@section('title')
Contact Us - Alchemortem
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Contact Us</h1>
        <p>Send us your questions, comments, and suggestions. We would love to hear from you!</p>
    </div>
</div>
<div class="row contact">
    <div class="col-md-6 offset-md-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (\Session::has('success'))
          <div class="alert alert-success">
              <p>{{ \Session::get('success') }}</p>
          </div><br />
        @endif
        <form action="{{ route('contact.store') }}" method="post">
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="message">Comments</label>
                <textarea id="message" name="message" rows="5" cols="40" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
            {{ csrf_field() }}
        </form>
    </div>
</div>
@endsection