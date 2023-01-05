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
        $cart = DB::table('carts')->where('user_id', 'like', auth()->user()->id)->get();
        $products = DB::table('products')->get();
        // dd($products);
        // dd($cart);
        return view('cart', ['cart' => $cart, 'products' => $products]);
    }

    public function checkout()
    {
        $cart = DB::table('carts')->where('user_id', 'like', auth()->user()->id)->get();
        $products = DB::table('products')->get();
        $random = Str::random(6);
        // dd($products);
        // dd($cart);
        return view('checkout', ['cart' => $cart, 'products' => $products, 'random' => $random]);
    }

    public function transaction()
    {
        $cart = DB::table('carts')->where('user_id', 'like', auth()->user()->id)->get();
        $products = DB::table('products')->get();
        // dd($products);
        // dd($cart);
        return view('transaction', ['cart' => $cart, 'products' => $products]);
    }
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
            ])->get();

        if (sizeof($temp) > 0) {
            return redirect()->back()->with('message', 'Product is already in cart');
        }
        // if(sizeof($temp) > 0) {
        //     if($product->quantity == 0) {
        //         return redirect()->back()->with('message', 'Product sold out');
        //     } else {
        //         DB::table('carts')
        //             ->where([
        //                 ['user_id', 'like', auth()->user()->id],
        //                 ['product_id', 'like' $id],
        //                 ['check-out-status', '=', '0']
        //                 ])
        //             ->update()
        //     }
        // } else {

        // }

        $products = Product::find($id);
        DB::table('carts')->insert([
            'user_id' => auth()->user()->id,
            'product_id' => $id,
            'quantity' => '1',
            'check_out_status' => '0'
        ]);
        DB::table('products')
            ->where('id', 'like', $id)
            ->update(['quantity' => $products->quantity - 1]);

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
            'quantity' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $tr = Cart::find($id);
        $product = Product::find($tr->product_id);
        if ($request->get('quantity') > $tr->quantity) {
            if ($product->quantity > $request->get('quantity') - $tr->quantity) {
                //update cart and product
            } else {
                // invalid stock kurang
                return redirect()->back()->with('message', 'stock is not enough');
            }
        } else if ($request->get('quantity') < $tr->quantity) {
            if ($request->get('quantity') == 0) {
                //delete from cart
            } else {
                //update cart
            }
            // update product

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
