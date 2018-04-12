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
                <label for="contactName">Your Name</label>
                <input type="text" id="contactName" name="contactName" class="form-control">
            </div>
            <div class="form-group">
                <label for="contactEmail">Your Email</label>
                <input type="email" id="contactEmail" name="contactEmail" class="form-control">
            </div>
            <div class="form-group">
                <label for="contactMessage">Comments</label>
                <textarea id="contactMessage" name="contactMessage" rows="5" cols="40" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
            {{ csrf_field() }}
        </form>
    </div>
</div>
@endsection