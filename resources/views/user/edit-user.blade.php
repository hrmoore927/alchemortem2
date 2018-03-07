@extends('layouts.master')

@section('title')
ADMIN - Edit User - Alchemortem

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
    <div class="row">
    <div class="col-md-12">
        <h1>ADMIN - Edit User</h1>
    </div>
    <form method="post" action="{{action('UserController@editUser', $id)}}" >
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="fName">First Name</label>
            <input type="text" class="form-control" name="fName" value={{$user->fName}} />
        </div>
        <div class="form-group">
            <label for="lName">Last Name</label>
            <input type="text" class="form-control" name="lName" value={{$user->lName}} />
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" value={{$user->email}} />
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" class="form-control" name="role" value={{$user->role}} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection