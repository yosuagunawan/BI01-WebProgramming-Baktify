@extends('layout.main')


@section('section')
    <h1>Halaman Home<h1>
            @foreach ($products as $product)
                {{ $product->name }}
                {{ $product->price }}
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
