@extends('layout.main')

@section('container')
    @if (count($carts) == 0)
        <h4>Cart is empty</h4>
    @else
        <h4>Your Cart</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">PRODUCT</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">QTY</th>
                    <th scope="col">SUBTOTAL</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            @foreach ($carts as $c)
                <form action="{{Route('member.updatecart', ['id' => $c->id])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <tbody>
                        <tr>
                            @foreach ($products as $p)
                                @if ($c->product_id == $p->id)
                                    <td>
                                        <img src="../storage/ProductImages/{{ $p->product_image }}" alt="">
                                        {{ $p->name }}
                                    </td>
                                    <td>{{ $p->price }}</td>
                                @endif
                            @endforeach
                                <td><input type="number" value="{{ $c->quantity }}" id="exampleFormControlInput1" name="quantity"></td>
                                @foreach ($products as $p)
                                    @if ($c->product_id == $p->id)
                                        <td>{{ $c->quantity * $p->price }}</td>
                                    @endif
                                @endforeach
                                <td>
                                    <button type="submit" class="btn btn-primary"
                                        onclick="location.href='{{ url('updatecart', ['id' => $c->id]) }}'">Update Cart</button>
                                </td>
                        </tr>
                    </tbody>
                </form>
                @endforeach
        </table>
    <div id="check-out">
        <p>shipping address : {{auth()->user()->address}}</p>
        <h4>IDR {{$total}}</h4>
    </div>
    <div id="passcode">
        <form action="{{Route('member.checkout', ['passcode' => $passcode])}}" method="POST">
            @csrf
            <p>please enter the following passcode to checkout: {{$passcode}}</p>
            <input type="text" name="passcode">
            @if ($errors->any())
                <p style="color: red">{{ $errors->first() }}</p>
            @endif
            @if (session('alert'))
                <div class="alert alert-success">
                    {{ session('alert') }}
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Confirm</button>
        </form>
    </div>
    @endif
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
@endsection
