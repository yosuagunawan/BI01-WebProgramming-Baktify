@extends('layout.main');

@section('section')
    @foreach ($products as $p)
    <div class="card-item-container">
        <div class="card-item-image">
            <img id="product_image" src="storage/ProductImages/{{$p->product_image}}" alt="">
        </div>
        <div class="card-item-name">
            {{$p->name}}
        </div>
        <div class="card-item-price">
            IDR {{$p->price}}
        </div>
        @foreach ($product_types as $pt)
            @if($p->product_type_id == $pt->id)
                <div class="card-item-product_type">
                    {{$pt->type_name}}
                </div>
            @endif
        @endforeach
        <button class="card-inner-button" onclick="location.href='{{url('update_product', ['id' => $p->id])}}'">Update</button>
        <button class="card-inner-button" onclick="location.href='{{url('delete', ['id' => $p->id])}}'">Delete</button>
    </div>
    @endforeach
@endsection
