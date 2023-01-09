@extends('layout.main')

@section('section')
    @if (count($times) == 0)
        <h4 class="mb-4">You don't have any transaction</h4>
    @else
        <h4 class="mb-4">Your Cart</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">PRODUCT</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">QTY</th>
                    <th scope="col">SUBTOTAL</th>
                </tr>
            </thead>
            @foreach ($times as $t)
                <td style="border: none">
                    <h5>Transaction Date: {{ $t->transaction_time }}</h5>
                </td>
                @foreach ($carts as $c)
                    @if ($c->transaction_time == $t->transaction_time)
                        <tbody>
                            <tr>
                                @foreach ($products as $p)
                                    @if ($c->product_id == $p->id)
                                        <td>
                                            <img src="../storage/ProductImages/{{ $p->product_image }}" alt="">
                                            {{ $p->name }}
                                        </td>
                                        <td>IDR {{ number_format($p->price) }}</td>
                                    @endif
                                @endforeach
                                <td><input type="number" value="{{ $c->quantity }}" readonly></td>
                                @foreach ($products as $p)
                                    @if ($c->product_id == $p->id)
                                        <td>IDR {{ number_format($c->quantity * $p->price) }}</td>
                                    @endif
                                @endforeach
                            </tr>
                        </tbody>
                    @endif
                @endforeach
            @endforeach
        </table>
        <div class="text-end">
            <h3>Total Price: IDR {{ number_format($total) }}</h3>
        </div>
    @endif
@endsection
