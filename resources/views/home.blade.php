@extends('layout.main')

@section('section')
    <h1>Halaman Home</h1>
@endsection

@section('container')
    @foreach ($products as $product)
        <div class="card text-center p-1">
            <img src="{{ asset('storage/ProductImages/' . $product->product_image) }}"
                class="card-img-top img-thumbnail img-fluid" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->price }}</p>
                <h6 class="card-text bg-danger-subtle rounded-4 w-50 m-auto">{{ $product->product_type_id }}</h6>
                <hr>
                <a href="#" class="btn btn-primary">Add to Cart</a>
            </div>
        </div>



        <br>
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
