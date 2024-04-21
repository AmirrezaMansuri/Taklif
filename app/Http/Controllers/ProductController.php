<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products($cat_id)
    {
        $categories = Category::all();
        $products = Product::where('category_id', $cat_id)->get();
        return view('user.products', compact('products', 'categories'));
    }
    public function product($id)
    {
        $categories = Category::all();
        $product = Product::where('id', $id)->first();
        return view('user.product', compact('product', 'categories'));
    }
    public function table()
    {
        $products = product::all();
        foreach ($products as $product) {
            $cat = Category::where('id', $product->category_id)->first();
            $product['cat_name'] = $cat->name;
        }
        return view('admin.product.view', compact('products'));
    }
    public function show_create()
    {
        $categories = category::all();
        return view('admin.product.create', compact('categories'));
    }
    public function create_product()
    {
        DB::table('products')->insert([
            'name' => request('name'),
            'price' => request('price'),
            'off' => request('off'),
            'description' => request('description'),
            'category_id' => request('category_id'),
        ]);
        return redirect('/admin/product/');
    }
    public function show_update($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $categories = DB::table('categories')->get();
        return view('admin.product.update', compact('product', 'categories'));
    }
    public function update_product()
    {
    }
    public function destory($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect('/admin/product/');
    }
}
