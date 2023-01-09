@extends('layout.main')

@section('section')
    @if (count($carts) == 0)
        <h4>Cart is empty</h4>
    @else
        <h4>Your Cart</h4>
        <table class="table my-5">
            <thead>
                <tr>
                    <th scope="col">PRODUCT</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">QTY</th>
                    <th scope="col">SUBTOTAL</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            @php
                $total = 0;
            @endphp
            @foreach ($carts as $c)
                <tbody>
                    <tr>
                        @foreach ($products as $p)
                            @if ($c->product_id == $p->id)
                                <td>
                                    <img src="../storage/ProductImages/{{ $p->product_image }}" alt="">
                                    {{ $p->name }}
                                </td>
                                <td>{{ number_format($p->price) }}</td>
                            @endif
                        @endforeach
                        <td><input type="number" value="{{ $c->quantity }}" name="quantity"></td>
                        @foreach ($products as $p)
                            @if ($c->product_id == $p->id)
                                <td>{{ $c->quantity * $p->price }}</td>
                                @php
                                    number_format($subtotal) = $c->quantity * $p->price;
                                @endphp
                            @endif
                        @endforeach
                        <td>
                            <button class="btn btn-primary"
                                onclick="location.href='{{ url('updatecart', ['id' => $c->id]) }}'">Update Cart</button>
                        </td>
                    </tr>
                </tbody>
                @php
                    number_format($total) += $subtotal;
                @endphp
            @endforeach
        </table>
        <div class="d-flex justify-content-between flex-row-reverse">
            <h3>Total Price: {{ number_format($total) }}</h3>
            <p>Ship to: Member Address</p>
        </div>
        <div class="text-end">
            <p>Please enter the following passcode to checkout: {{ $random }}</p>
            <input type="text" name="confirmed" value="" class="form-control p-0 fs-2">
            <input type="submit" value="Confirm" class="btn btn-lg btn-primary">
        </div>
    @endif
@endsection
