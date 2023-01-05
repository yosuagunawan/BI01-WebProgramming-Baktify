@extends('layout.main')

@section('section')
    @if (count($cart) == 0)
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
            @foreach ($cart as $c)
                @if ($c->check_out_status == 1)
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
                            <td><input type="number" value="{{ $c->quantity }}" name="quantity"></td>
                            @foreach ($products as $p)
                                @if ($c->product_id == $p->id)
                                    <td>{{ $c->quantity * $p->price }}</td>
                                    @php
                                        $subtotal = $c->quantity * $p->price;
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
                        $total += $subtotal;
                    @endphp
                @endif
            @endforeach
        </table>
        <div class="d-flex justify-content-between flex-row-reverse">
            <h3>Total Price: {{ $total }}</h3>
        </div>
    @endif
@endsection
