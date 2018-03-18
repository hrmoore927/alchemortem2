@extends('layouts.account')

@section('account-content')
    <h2>My Info</h2>
    @if (\Session::has('success'))
          <div class="alert alert-success">
              <p>{{ \Session::get('success') }}</p>
          </div><br />
    @endif
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Name</th>
                <td>{{ Auth::user()->fName}} {{ Auth::user()->lName }}</td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td>{{ Auth::user()->email }}</td>
            </tr>
            <tr>
                <th scope="row">Role</th>
                <td>{{ Auth::user()->role }}</td>
            </tr>
            <tr>
                <th scope="row">Action</th>
                <td><a class="btn btn-primary" href="{{ route('edit-info', $user->id) }}">Update Info</a></td>
            </tr>
        </tbody>
    </table>
@endsection