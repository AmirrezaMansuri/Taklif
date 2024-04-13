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

Route::get('/', function () {
    $cats = DB::table('categories')->get();
    return view('user.home', compact('cats'));
});

Route::get('/products/{cat_id}', function ($cat_id) {
    $cats = DB::table('categories')->get();
    $products = DB::table('products')->where('category_id' , $cat_id)->get();
    return view('user.products', compact('products' , 'cats'));
});


Route::get('/product/{id}',function($id){
    $cats = DB::table('categories')->get();
    $product = DB::table('products')->where('id' , $id)->first();
    return view('user.product', compact('product','cats'));
});

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.home');
    });
    Route::prefix('product')->group(function (){
        Route::get('/', function () {
            $products = DB::table('products')->get();
            return view('admin.product.view',compact('products'));
        });
        Route::get('/create', function () {
            $categories= DB::table('categories')->get();
            return view('admin.product.create',compact('categories'));
        });
        Route::post('/create', function () {
            DB::table('products')->insert([
                'name'=> request('name'),
                'price'=> request('price'),
                'off'=> request('off'),
                'description'=> request('description'),
                'category_id'=> request('category_id'),
            ]);
            $products = DB::table('products')->get();
            return view('admin.product.view',compact('products'));
        });
        Route::get('/update/{id}', function ($id) {
            $product = DB::table('products')->where('id',$id)->first();
            $categories= DB::table('categories')->get();
            return view('admin.product.update',compact('product','categories'));
        });
        Route::post('/update', function () {});
        Route::post('/delete', function () {});
    });

    //__________________________________________________________________

    Route::prefix('category')->group(function (){
        Route::get('/', function () {
            $categories = DB::table('categories')->get();
            return view('admin.category.view' , compact('categories'));
        });
        Route::get('/create', function () {
            return view('admin.category.create');
        });
        Route::post('/create', function () {
            DB::table('categories')->insert([
                'name'=> request('name'),
            ]);
            $categories = DB::table('categories')->get();
            return view('admin.category.view', compact('categories'));
        });
        Route::get('/update/{id}', function ($id) {
            $category = DB::table('categories')->where('id',$id)->first();
            return view('admin.category.update', compact('category'));
        });
        Route::post('/update', function () {});
        Route::get('/delete', function () {});
    });

    //__________________________________________________________________
   
    Route::prefix('user')->group(function (){
        Route::get('/', function () {
            $categories = DB::table('categories')->get();
            return('admin.user.view');
        });
        Route::get('/create', function () {});
        Route::post('/create', function () {});
        Route::get('/update', function () {});
        Route::post('/update', function () {});
        Route::get('/delete', function () {});
    });
});