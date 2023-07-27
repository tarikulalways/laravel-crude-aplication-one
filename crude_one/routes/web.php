<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// category;
Route::controller(CategoryController::class)->group(function(){
    Route::get('/create/category', 'create')->name('create.category');
    Route::post('/store/category', 'store')->name('store.category');
    Route::get('/index/category', 'index')->name('index.category');
    Route::get('/edit/category/{category}', 'edit')->name('edit.category');
    Route::post('/update/category/{category}', 'update')->name('update.category');
    Route::get('/destroy/category/{category}', 'destroy')->name('destroy.category');
});

// sub Category
Route::controller(SubCategoryController::class)->group(function(){
    Route::get('/create/subcategory', 'create')->name('create.subcategory');
    Route::post('/store/subcategory', 'store')->name('store.subcategory');
    Route::get('/index/subcategory', 'index')->name('index.subcategory');
    Route::get('/edit/subcategory/{subCategory}', 'edit')->name('edit.subcategory');
    Route::post('/update/subcategory/{subCategory}', 'update')->name('update.subcategory');
    Route::get('/destroy/subcategory/{subCategory}', 'destroy')->name('destroy.subcategory');
});

// product
Route::controller(ProductController::class)->group(function(){
    Route::get('/create/product', 'create')->name('create.product');
    Route::post('/store/product', 'store')->name('store.product');
    Route::get('/index/product', 'index')->name('index.product');
});
