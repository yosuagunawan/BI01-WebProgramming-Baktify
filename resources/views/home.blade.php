@extends('layout.main')

@section('section')
    <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-5 fw-bold">The Biggest and <br> Most Complete Music Store</h1>
    </div>

    <div class="b-example-divider"></div>

    <div class="px-4 pt-5 my-5 text-center">
        <div class="">
            <div class="container px-5">
                <img src="asset/Music.png" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" loading="lazy">
            </div>
        </div>
        <h1 class="display-4 fw-bold">All Your Music Needs in <br> One Place</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">All music ranges from classical to rock to kpop in one convenient place, you never have to
                go anywhere else</p>
        </div>
    </div>

    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="asset/TowerRecords.jpg" class="d-block mx-lg-auto img-fluid img-thumbnail" loading="lazy">
                {{-- https://www.goldenplec.com/tower-records/ --}}
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">The Coziest Music Store Ever</h1>
                <p class="lead">Not only Baktify is the largest music store but also have a in-store cafe known for
                    high-quality cakes and drinks</p>
            </div>
        </div>
    </div>

    <div class="container col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="asset/Connection.jpg" class="d-block mx-lg-auto img-fluid img-thumbnail" loading="lazy">
                {{-- https://www.shutterstock.com/video/clip-4858514-global-network --}}
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">No #1 For Low Prices</h1>
                <p class="lead">Because of our good relation and connection with the music industry, we are able to
                    provide music with low prices</p>
            </div>
        </div>
    </div>
@endsection


{{-- -------------------------------------------------------------------------------------- --}}
{{-- -------------------------------------------------------------------------------------- --}}
{{-- ---------------------------------- Home Sebelumnya ----------------------------------- --}}
{{-- -------------------------------------------------------------------------------------- --}}
{{-- -------------------------------------------------------------------------------------- --}}

{{--
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
                <h6 class="card-text bg-danger-subtle rounded-4 w-75 m-auto p-2">{{ $product->product_type_id }}</h6>
                <hr>
                <a href="#" class="btn btn-primary">Add to Cart</a>
            </div>
        </div>
        <br>
    @endforeach
@endsection

@section('end')
    <div class="mt-3">
        {{ $products->links() }}
    </div>
@endsection
--}}
