<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $carts = DB::table('carts')
            ->where([
                ['user_id', 'like', auth()->user()->id],
                ['check_out_status', '=', '0']
            ])->get();
        $products = DB::table('products')->get();
        $total = 0;
        foreach($carts as $c) {
            foreach($products as $p) {
                if($c->product_id == $p->id) {
                    $total = $total + $c->quantity * $p->price;
                }
            }
        }
        // dd($total);
        // dd($products);
        // dd($cart);
        return view('cart', ['carts' => $carts, 'products' => $products, 'total' => $total]);
    }

    public function transaction() {
        $times = DB::table('carts')->distinct()->where('check_out_status', '=', '1')->orderBy('transaction_time', 'DESC')->get('transaction_time');
        $carts = DB::table('carts')
            ->where([
                ['user_id', 'like', auth()->user()->id],
                ['check_out_status', '=', '1']
            ])->get();
        $products = DB::table('products')->get();
        $total = 0;
        foreach($carts as $c) {
            foreach($products as $p) {
                if($c->product_id == $p->id) {
                    $total = $total + $c->quantity * $p->price;
                }
            }
        }
        // dd($times);
        // dd($total);
        // dd($products);
        // dd($carts);
        return view('transaction', ['carts' => $carts, 'products' => $products, 'total' => $total, 'times' => $times]);
    }

    // public function checkout()
    // {
    //     $carts = DB::table('carts')->where('user_id', 'like', auth()->user()->id)->get();
    //     $products = DB::table('products')->get();
    //     $random = Str::random(6);
    //     // dd($products);
    //     // dd($cart);
    //     return view('checkout', ['carts' => $carts, 'products' => $products, 'random' => $random]);
    // }

    // public function transaction()
    // {
    //     $cart = DB::table('carts')->where('user_id', 'like', auth()->user()->id)->get();
    //     $products = DB::table('products')->get();
    //     // dd($products);
    //     // dd($cart);
    //     return view('transaction', ['cart' => $cart, 'products' => $products]);
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $temp = DB::table('carts')
            ->where([
                ['user_id', 'like', auth()->user()->id],
                ['product_id', 'like', $id],
                ['check_out_status', '=', '0']
            ])->first();

        // dd($temp);
        $product = Product::find($id);
        if($product->quantity == 0) {
            // dd($product);
            return redirect()->back()->withErrors('Product sold out');
        }
        if($temp == null) {
            DB::table('carts')->insert([
                'user_id' => auth()->user()->id,
                'product_id' => $id,
                'quantity' => '1',
                'check_out_status' => '0',
                'transaction_time' => ' '
            ]);
        } else {
            DB::table('carts')
                ->where([
                    ['user_id', 'like', auth()->user()->id],
                    ['product_id', 'like', $id],
                    ['check_out_status', '=', '0']
                ])
                -> update([
                    'quantity' => $temp->quantity + 1
                ]);

            DB::table('products')
                ->where('id', 'like', $id)
                ->update(['quantity' => $product->quantity - 1]);
        }
        DB::table('products')
            ->where('id', 'like', $id)
            ->update(['quantity' => $product->quantity - 1]);

        return redirect()->back()->with('message', 'Product added to cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'quantity' => 'numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $tr = Cart::find($id);
        $product = Product::find($tr->product_id);
        // dd($request->get('quantity'));
        if ($request->get('quantity') > $tr->quantity) {
            // dd('aaa');
            if ($product->quantity >= $request->get('quantity') - $tr->quantity) {
                //update cart and product
                DB::table('products')
                    -> where('id', 'like', $tr->product_id)
                    -> update(['quantity' => ($product->quantity + $tr->quantity - $request->get('quantity'))]);
                DB::table('carts')
                    ->where('id', 'like', $tr->id)
                    ->update(['quantity' => $request->get('quantity')]);
            } else {
                // invalid stock kurang
                return redirect()->back()->with('message', 'stock is not enough');
            }
        } else if ($request->get('quantity') < $tr->quantity) {
            // dd('bbb');
            DB::table('products')
                -> where('id', 'like', $tr->product_id)
                -> update(['quantity' => ($product->quantity + ($tr->quantity - $request->get('quantity')))]);
            if ($request->get('quantity') == 0) {
                //delete from cart
                DB::table('carts')->where('id', 'like', $id)->delete();
            } else {
                //update cart
                DB::table('carts')
                    ->where('id', 'like', $tr->id)
                    ->update(['quantity' => $request->get('quantity')]);
            }
        }
        return redirect()->back()->with('message', 'Successfully Updated');
    }

    public function viewcheckout() {
        $carts = DB::table('carts')
            ->where([
                ['user_id', 'like', auth()->user()->id],
                ['check_out_status', '=', '0']
            ])->get();
        $products = DB::table('products')->get();
        $total = 0;
        foreach($carts as $c) {
            foreach($products as $p) {
                if($c->product_id == $p->id) {
                    $total = $total + $c->quantity * $p->price;
                }
            }
        }
        // dd($total);
        // dd($products);
        // dd($cart);
        $characters = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lgt = strlen($characters);
        $passcode = '';
        for ($i=0;$i<6;$i++) {
            $passcode .= $characters[rand(0, $lgt - 1)];
        }
        return view('checkout_cart', ['carts' => $carts, 'products' => $products, 'total' => $total, 'passcode' => $passcode]);
    }
    public function checkout(Request $request, $passcode) {
        $time = now()->format('Y-m-d').' '.now()->format('H:i:s');
        // dd($time);
        if ($request->get('passcode') == $passcode) {
            DB::table('carts')
                ->where('check_out_status', '=', '0')
                ->update(['check_out_status' => '1', 'transaction_time' => $time]);
            return redirect()->back()->with('alert', 'Transaction success! You will receive our product soon! Thank you for shopping with us');
        } else {
            return redirect()->back()->withErrors("Passcode does not match");
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //

    }
}
