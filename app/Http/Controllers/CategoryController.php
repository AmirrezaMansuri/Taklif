<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = category::all();
        return view('user.home', compact('categories'));
    }
    public function table()
    {
        $categories = DB::table('categories')->get();
        return view('admin.category.view', compact('categories'));
    }
    public function show_create()
    {
        return view('admin.category.create');
    }
    public function create_category()
    {
        DB::table('categories')->insert([
            'name' => request('name'),
        ]);
        $categories = DB::table('categories')->get();
        return redirect('/admin/category/');
    }
    public function show_update($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.update', compact('category'));
    }
    public function destory($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return redirect('/admin/category/');
    }
}
