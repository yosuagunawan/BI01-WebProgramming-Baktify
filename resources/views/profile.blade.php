@extends('layout.main')

@section('section')
    <h1 class="text-center">
        Your Profile
    </h1>
    <div class="w-50 m-auto">
        <h3>Name:</h3>
        <p>{{ auth()->user()->name }}</p>
        <h3>Email:</h3>
        <p> {{ auth()->user()->email }}</p>
        <h3>Password:</h3>
        <p>......</p>
        {{-- <h3>Password: <br> {{ auth()->user()->password }}</h3> --}}
        <h3>Address:</h3>
        <p>{{ auth()->user()->address }}</p>
        <h3>Phone:</h3>
        <p>{{ auth()->user()->phone }}</p>
        <div class="text-end">
            <a class=" btn btn-primary" href="/profile_update">Update</a>
            <a class=" btn btn-danger" href="/logout">Logout</a>
        </div>
    </div>
@endsection
