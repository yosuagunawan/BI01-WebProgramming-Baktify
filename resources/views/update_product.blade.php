@extends('layout.main')

@section('section')
    {{-- <h1>Update Product Page</h1>
    <br> --}}
    <h3>{{ $product->name }}</h3>
    <div class="d-flex justify-content-center">
        <img id="product_image" class="h-100 w-50 img-thumbnail" src="../storage/ProductImages/{{ $product->product_image }}"
            alt="">
    </div>
    <form method="POST" action="{{ Route('admin.updateproduct', ['id' => $product->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="exampleFormControlFile1">Image</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="product_image"
                alt="">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Product Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name"
                value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Description</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="description"
                value="{{ $product->description }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Price</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" name="price"
                value="{{ $product->price }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Product Quantity</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" name="stock"
                value="{{ $product->quantity }}">
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
@endsection
