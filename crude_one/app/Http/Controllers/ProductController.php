<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get(['id', 'name']);
        $subcategories = SubCategory::get(['id', 'name']);
        return view('product.create', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {

        if($request->hasFile('image')){
            $upload_img = $request->file('image');
            $fileName = $upload_img->getClientOriginalName();
        }else{
            return back();
        }

        $product = Product::create([
            'category_id' => $request->category_name,
            'subcategory_id' => $request->subcategory_name,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $request->image,
            'price' => $request->price,
            'description' => $request->description,
            'is_active' => filled($request->is_active)
        ]);

        $path = $request->file('image')->storeAs('product-img', $fileName, 'public');

        session()->flash('store', 'Product Uploaded Successfull');
        return redirect()->route('create.product');
    }

    // public function uploads_file($request, $product_id){
    //     dd($product_id);
    //     if($request->hasFile('image')){
    //         $img_path = '/public/uploade/product-img/';
    //         $upload_img = $request->file('image');


    //         dd($upload_img);

    //     }

    // }

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
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
