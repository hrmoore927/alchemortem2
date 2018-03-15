@extends('layouts.account')

@section('account-content')
    <h2>My Info</h2>
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
                <th scope="row">Shipping Address</th>
                <td></td>
            </tr>
        </tbody>
    </table>
@endsection