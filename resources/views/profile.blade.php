@extends('layout.main')

@section('section')
    <h1>
        Halaman Profile
    </h1>
    <h1><u class="">Name: {{ auth()->user()->name }}</u></h1>
@endsection
