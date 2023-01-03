@extends('layout.main')

@section('section')
    <div class="w-50 m-auto my-2">
        <img src="{{ asset('storage/ProductImages/' . $product->product_image) }}" class="img-thumbnail" alt="...">
    </div>
    <h1>
        {{ $product->name }}
    </h1>
    <p>{{ $product->description }}</p>
    <p>Stock: {{ $product->quantity }}</p>
    <p>Category: {{ $product->product_type->type_name }}</p>
@endsection
