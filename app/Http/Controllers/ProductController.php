<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // route home
    public function index()
    {
        $products = Product::all();
        return view('home', ['products' => $products]);
    }
    // route insert_product page
    public function index2()
    {
        $product_types = DB::table('product_types')->get();
        return view('insert_product', ['product_types' => $product_types]);
    }
    // route products page
    public function index3()
    {
        $products = Product::all();
        $product_types = DB::table('product_types')->get();
        return view('products', ['products' => $products, 'product_types' => $product_types]);
    }
    //route update_product page
    public function index4($id) {
        $product = Product::find($id);
        // dd($product);
        return view('update_product', compact('product'));
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
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'product_image' => 'required|image|mimes:jpeg,jpg,png',
            'name' => 'required|min:5',
            'description' => 'required|min:15|max:500',
            'price' => 'required|numeric|min:1000|max:10000000',
            'stock' => 'required|numeric|min:1|max:10000',
            'product_type' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $productImageFile = $request->file('product_image');
        $productImageName = $productImageFile->getClientOriginalName();
        Storage::putFileAs('public/ProductImages', $productImageFile, $productImageName);

        DB::table('products')->insert([
            'product_type_id' => $request->get('product_type'),
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'quantity' => $request->get('stock'),
            'product_image' => $productImageName
        ]);

        return redirect()->back()->with('message', 'Product successfully inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(),[
            'product_image' => 'image|mimes:jpeg,jpg,png',
            'name' => 'required|min:5',
            'description' => 'required|min:15|max:500',
            'price' => 'required|numeric|min:1000|max:10000000',
            'stock' => 'required|numeric|min:1|max:10000',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if ($request->file('product_image') != null) {
            $productImageFile = $request->file('product_image');
            $productImageName = $productImageFile->getClientOriginalName();
            Storage::putFileAs('public/ProductImages', $productImageFile, $productImageName);

            DB::table('products')
                -> where('id', 'like', $id)
                -> update(['product_image' => $productImageName]);
        }

        DB::table('products')
            -> where('id', 'like', $id)
            -> update(
                ['name' => $request->get('name'),
                'description' => $request->get('description'),
                'price' => $request->get('price'),
                'quantity' => $request->get('stock')]
            );

        return redirect()->back()->with('message', 'Product successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('products')->where('id', 'like', $id)->delete();
        return redirect()->back();
    }
}
