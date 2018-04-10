@extends('layouts.emailTemp')

@section('content')
<div class="row">
    <div class="col-md-12">
        <p>Hi Jackie,</p>
        <p>You have a message from a user of Alchemortem.com.</p>
        <div id="contactInfo">
            <p>Name: {{ $contact['name'] }}</p>
            <p>Email: {{ $contact['email'] }}</p>
            <p>Message: {{ $contact['message'] }}</p>
        </div>
        <p>Please respond when possible.</p>
        <p>Thanks,</p>
        <p>Alchemortem Web Services</p>
    </div>
</div>
@endsection