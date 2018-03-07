@extends('layouts.master')

@section('title')
ADMIN - Manage Users - Alchemortem
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>First</th>
                    <th>Last</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->fName }}</td>
                        <td>{{ $user->lName }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td><a class="btn btn-primary" href="{{ route('edit-user', $user->id) }}">Edit</a></td>
                        <td><a class="btn btn-danger" href="{{ route('delete-user', $user->id) }}">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection