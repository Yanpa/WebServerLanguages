<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $formFields = $request->validate([
            'name' => ['required', 'max:50'],
            'description' => ['nullable', 'max:2000'],
            'purchase_price' => ['required'],
            'selling_price' => ['required'],
            'number_of_products' => ['required'],
            'product_code' => ['required'],
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('files', 'public');
        }

        Product::create($formFields);

        return redirect('/');
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
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $formFields = $request->validate([
            'name' => ['required', 'max:50'],
            'description' => ['nullable', 'max:2000'],
            'purchase_price' => ['required'],
            'selling_price' => ['required'],
            'number_of_products' => ['required'],
            'product_code' => ['required'],
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('files', 'public');
        }

        $product->update($formFields);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/');
    }
}
