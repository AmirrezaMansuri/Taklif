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
        $categories = category::all();
        return view('admin.category.view', compact('categories'));
    }
    public function show_create()
    {
        return view('admin.category.create');
    }
    public function create_category(Request $req)
    {
        $insert = new category();
        $insert->name = $req->name;
        $insert->save();
        $categories = DB::table('categories')->get();
        return redirect('/admin/category/');
    }
    public function show_update($id)
    {
        $category = category::where('id', $id)->first();
        return view('admin.category.update', compact('category'));
    }
    public function update_category(Request $req, $id)
    {
        $update = category::find($id);
        $update->name = $req->name;
        $update->save();
        return redirect('/admin/category/');

    }
    public function destory($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return redirect('/admin/category/');
    }
}
