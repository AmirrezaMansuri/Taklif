<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\user;
use App\Models\Category;
use App\Models\Product;
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


Route::get('/', [CategoryController::class, 'list']);
Route::get('/products/{cat_id}', [ProductController::class, 'products']);
Route::get('/product/{id}', [ProductController::class, 'product']);

//__________________________________________________________________

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.home');
    });
    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'table']);
        Route::get('/create', [ProductController::class, 'show_create']);
        Route::post('/create', [ProductController::class, 'create_product']);
        Route::get('/update/{id}', [ProductController::class, 'show_update']);
        Route::post('/update', [ProductController::class, 'update_product']);
        Route::get('/delete/{id}', [ProductController::class, 'destory']);
    });

    //__________________________________________________________________

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'table']);
        Route::get('/create', [CategoryController::class, 'show_create']);
        Route::post('/create', [CategoryController::class, 'create_category']);
        Route::get('/update/{id}', [CategoryController::class, 'show_update']);
        Route::post('/update', [CategoryController::class, 'update_category']);
        Route::get('/delete/{id}', [CategoryController::class, 'destory']);
    });

    //__________________________________________________________________

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'table']);
        Route::get('/create', [UserController::class,'show_create']);
        Route::post('/create', [UserController::class,'create_user']);
        Route::get('/update/{id}', [UserController::class,'show_update']);
        Route::post('/update', [UserController::class,'update_user']);
        Route::get('/delete/{id}', [UserController::class,'destroy']);
    });
});
