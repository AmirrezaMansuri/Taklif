<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\user;
use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
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



Route::middleware('auth')->group(function () {
    Route::get('/', [CategoryController::class, 'list']);
    Route::get('/products/{cat_id}', [ProductController::class, 'products']);
    Route::get('/product/{id}', [ProductController::class, 'product']);

    //__________________________________________________________________
    Route::get('role',function(){
        $owner = Role::create([
            'name' => 'owner',
            'display_name' => 'Project Owner', // optional
            'description' => 'User is the owner of a given project', // optional
        ]);
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'User Administrator', // optional
            'description' => 'User is allowed to manage and edit other users', // optional
        ]);
        $admin = Role::create([
            'name' => 'user',
            'display_name' => 'User', // optional
            'description' => '', // optional
        ]);
    });
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
            Route::post('/update/{id}', [ProductController::class, 'update_product']);
            Route::get('/delete/{id}', [ProductController::class, 'destory']);
            Route::get('/image/{id}', [ProductController::class, 'show_image']);
            Route::post('/image/{id}', [ProductController::class, 'create_image']);
        });

        //__________________________________________________________________

        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'table']);
            Route::get('/create', [CategoryController::class, 'show_create']);
            Route::post('/create', [CategoryController::class, 'create_category']);
            Route::get('/update/{id}', [CategoryController::class, 'show_update']);
            Route::post('/update/{id}', [CategoryController::class, 'update_category']);
            Route::get('/delete/{id}', [CategoryController::class, 'destory']);
            Route::get('/image/{id}', [CategoryController::class, 'show_image']);
            Route::post('/image/{id}', [CategoryController::class, 'create_image']);
        });

        //__________________________________________________________________

        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'table']);
            Route::get('/create', [UserController::class, 'show_create']);
            Route::post('/create', [UserController::class, 'create_user']);
            Route::get('/update/{id}', [UserController::class, 'show_update']);
            Route::post('/update/{id}', [UserController::class, 'update_user']);
            Route::get('/delete/{id}', [UserController::class, 'destroy']);
            Route::get('/image/{id}', [UserController::class, 'show_image']);
            Route::post('/image/{id}', [UserController::class, 'create_image']);
        });
    });
    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'show']);
        Route::get('/delete/{cart_id}/{prod_id}', [CartController::class, 'delete']);
        Route::get('/payment/{id}',[CartController::class,'payment']);
        Route::get('/create/{id}', [CartController::class, 'create']);
    });

});


Route::prefix('auth')->group(function () {
    Route::get('/register', [AuthController::class, 'show_register']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'show_login'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login-user');
    Route::get('/logout', [AuthController::class, 'logout']);
});
