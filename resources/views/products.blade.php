@extends('layout.main')

@section('container')
    {{-- alert --}}
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
    @foreach ($products as $product)
        <div class="card text-center p-1">
            <a href="/products/{{ $product->id }}">
                <img src="{{ asset('storage/ProductImages/' . $product->product_image) }}"
                    class="card-img-top img-thumbnail img-fluid" alt="...">
            </a>

            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->price }}</p>
                @foreach ($product_types as $pt)
                    @if ($product->product_type_id == $pt->id)
                        <h6 class="card-text bg-danger-subtle rounded-4 w-75 m-auto p-2">
                            {{ $pt->type_name }}
                        </h6>
                    @endif
                @endforeach
                <hr>
                @auth
                    @if (auth()->user()->role_id == '1')
                        <div class="d-flex gap-1 justify-content-center">
                            <button class="btn btn-primary"
                                onclick="location.href='{{ url('addtocart', ['id' => $product->id]) }}'">Add to Cart</button>
                        </div>
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

    {{-- @foreach ($products as $product)
                <div class="col">
                    <div class="card p-3 my-2">
                        <img src="/asset/BookMockup.png" class="img-thumbnail img-fluid" alt="...">
                        <article class="mainPost">
                            <h2>
                                <a href="/posts/{{ $post->slug }}" class="text-decoration-none">
                                    {{ $post->title }}
                                </a>
                            </h2>

                            <p>By:
                                <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">
                                    {{ $post->author->name }}
                                </a>
                                <br>
                                <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">
                                    {{ $post->category->name }}
                                </a>
                            </p>

                            <p>{{ $post->excerpt }}</p>

                            <button type="button" class="btn btn-primary">
                                <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-light">
                                    Detail
                                </a>
                            </button>
                        </article>
                    </div>
                </div>
            @endforeach --}}
@endsection

@section('end')
    <div class="mt-3">
        {{ $products->links() }}
    </div>
@endsection

{{-- @section()
    @foreach ($products as $p)
        <div class="card-item-container">
            <div class="card-item-image">
                <img id="product_image" src="storage/ProductImages/{{ $p->product_image }}" alt="">
            </div>
            <div class="card-item-name">
                {{ $p->name }}
            </div>
            <div class="card-item-price">
                IDR {{ $p->price }}
            </div>
            @foreach ($product_types as $pt)
                @if ($p->product_type_id == $pt->id)
                    <div class="card-item-product_type">
                        {{ $pt->type_name }}
                    </div>
                @endif
            @endforeach
            <button class="card-inner-button"
                onclick="location.href='{{ url('update_product', ['id' => $p->id]) }}'">Update</button>
            <button class="card-inner-button"
                onclick="location.href='{{ url('delete', ['id' => $p->id]) }}'">Delete</button>
        </div>
    @endforeach
@endsection --}}
