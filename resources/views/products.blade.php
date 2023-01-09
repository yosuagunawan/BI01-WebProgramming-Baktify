@extends('layout.main')

@section('section')
    <div class="container mb-2">
        @if (session()->has('message'))
            <div class="alert alert-success" id="message">
                {{ session()->get('message') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger mt-5" id="error">
                {{ $errors->first() }}
            </div>
        @endif
    </div>
    <form action="" class="input-group mb-3 w-50 m-auto">
        <input type="search" name="search" value="{{ $search }}" class="form-control d-inline"
            placeholder="Search....">
        <button class="btn btn-primary rounded-end">Search</button>
        @if (auth()->user()->role_id == '2')
            <a href="/insert_product" class="btn btn-secondary mx-3 rounded-start">Insert Product</a>
        @else
            <br>
        @endif
        {{-- <a href="/products" class="btn btn-info mx-3">Back to Products</a> --}}
    </form>
@endsection

@section('container')
    {{-- alert --}}
    @foreach ($products as $product)
        <div class="card text-center p-1">
            <a href="/products/{{ $product->id }}">
                <img src="{{ asset('storage/ProductImages/' . $product->product_image) }}"
                    class="card-img-top img-thumbnail img-fluid" alt="...">
            </a>

            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">IDR {{ number_format($product->price) }}</p>
                @foreach ($product_types as $pt)
                    @if ($product->product_type_id == $pt->id)
                        <h6 class="card-text bg-danger-subtle rounded-4 w-75 m-auto p-2">
                            {{ $pt->type_name }}
                        </h6>
                    @endif
                @endforeach

                @auth
                    <hr>
                    @if (auth()->user()->role_id == '1')
                        @if ($product->quantity == 0)
                            <p class="bg-danger rounded p-2 text-white">Out Of Stock</p>
                        @else
                            <div class="d-flex gap-1 justify-content-center">
                                <button class="btn btn-primary"
                                    onclick="location.href='{{ url('addtocart', ['id' => $product->id]) }}'">Add to
                                    Cart</button>
                            </div>
                        @endif
                    @else
                        <div class="d-flex gap-1">
                            <button class="btn btn-primary"
                                onclick="location.href='{{ url('update_product', ['id' => $product->id]) }}'">Update</button>
                            <button class="btn btn-danger"
                                onclick="location.href='{{ url('delete', ['id' => $product->id]) }}'">Delete</button>
                        </div>
                    @endif

                @endauth

            </div>
        </div>
    @endforeach
@endsection

{{-- @section('end')
    <div class="mt-3">
        {{ $products->links() }}
    </div>
@endsection --}}
