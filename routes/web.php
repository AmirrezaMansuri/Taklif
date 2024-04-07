<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    $cats = DB::table('categories')->get();
    return view('user.home', compact('cats'));
});
Route::get('/products', function () {
    $cats = DB::table('categories')->get();
    $products = DB::table('products')->get();
    return view('user.products', compact('products' , 'cats'));
});
Route::get('/categories', function () {
    $cats = DB::table('categories')->get();
    $categories = DB::table('categories')->get();
    return view('user.categories', compact('categories' , 'cats'));
});
Route::get('/product/{cat_id}',function($cat_id){
    $cats = DB::table('categories')->get();
    $product = DB::table('products')->where('category_id' , $cat_id)->first();
    return view('user.product', compact('product','cats'));
});

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.home');
    });
    Route::prefix('product')->group(function (){
        Route::get('/', function () {
            $products = DB::table('products')->get();
            return view('admin.home');
        });
        Route::get('/insert', function () {});
        Route::post('/insert', function () {});
        Route::get('/update', function () {});
        Route::post('/update', function () {});
        Route::post('/delete', function () {});
    });
    Route::prefix('categories')->group(function (){
        Route::get('/', function () {});
        Route::get('/insert', function () {});
        Route::post('/insert', function () {});
        Route::get('/update', function () {});
        Route::post('/update', function () {});
        Route::get('/delete', function () {});
    });
});