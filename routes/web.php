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
Route::prefix('/user')->group(function(){
    Route::get('/home', function () {
        $cats = DB::table('categories')->get();
        return view('user.home',compact('cats'));
    });
    Route::get('/product',function(){
        $products = DB::table('products')->get();
        return view('user.home' , compact('products'));
    });
});

