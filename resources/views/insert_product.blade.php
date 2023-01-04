@extends('layout.main')

@section('section')
    <form method="POST" action="{{ Route('admin.insertproduct') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group d-flex">
            <label for="exampleFormControlFile1" class="w-50">Image</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="product_image">
        </div>
        <hr>
        <div class="form-group d-flex">
            <label for="exampleFormControlInput1" class="w-50">Product Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
        </div>
        <hr>
        <div class="form-group d-flex">
            <label for="exampleFormControlInput1" class="w-50">Description</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="description">
        </div>
        <hr>
        <div class="form-group d-flex">
            <label for="exampleFormControlInput1" class="w-50">Price</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" name="price">
        </div>
        <hr>
        <div class="form-group d-flex">
            <label for="exampleFormControlInput1" class="w-50">Product Quantity</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" name="stock">
        </div>
        <hr>
        <div class="form-group d-flex">
            <label for="exampleFormControlSelect1" class="w-50">Category Name</label>
            <select class="form-control" id="exampleFormControlSelect1" name="product_type">
                @foreach ($product_types as $x)
                    <option value="{{ $x->id }}">{{ $x->type_name }}</option>
                @endforeach
            </select>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/products" class="btn btn-danger">Cancel</a>
        @if (session()->has('message'))
            <div class="alert alert-success mt-5">
                {{ session()->get('message') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger mt-5">
                {{ $errors->first() }}
            </div>
        @endif
    @endsection
