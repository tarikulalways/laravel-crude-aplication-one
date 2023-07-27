<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\SubcategoryStoreRequest;
use App\Http\Requests\SubCategoryUpdateRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::with('category')->get();
        return view('subcategory.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get(['id', 'name']);
        return view('subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryStoreRequest $request)
    {
        $store = SubCategory::create([
            'name' => $request->subcaregory_name,
            'slug' => Str::slug($request->subcaregory_name),
            'category_id' => $request->category_name,
            'is_active' => filled($request->is_active)
        ]);
        session()->flash('store', 'Sub Category Added Successfull');
        return redirect()->route('create.subcategory');
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::get(['id', 'name']);
        return view('subcategory.edit', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryUpdateRequest $request, SubCategory $subCategory)
    {
        $subCategory->update([
            'category_id' => $request->category_name,
            'name' => $request->subcaregory_name,
            'slug' => Str::slug($request->subcaregory_name),
            'is_active' => filled($request->is_active)
        ]);

        session()->flash('update', 'Update SubCategory Successfull');
        return redirect()->route('index.subcategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        session()->flash('destroy', 'Delete SubCategory Successfull');
        return redirect()->route('index.subcategory');
    }
}
