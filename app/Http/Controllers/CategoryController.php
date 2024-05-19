<?php

namespace App\Http\Controllers;
use App\Models\Image;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;
use Validator;
use Auth;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = category::all();
        foreach($categories as $category){
            $image = Image::where('subject_id',$category->id)->where('type','3')->first();
            $category['img']=$image;
        }


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
        $data = $req->all();
        $rule = [
            'name' => 'required',
        ];
        $errors = Validator::make($data, $rule);

        if ($errors->fails()) {
            return redirect()->back()->withErrors($errors)->withInput();
        }

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
        $data = $req->all();
        $rule = [
            'name' => 'required|required',
        ];
        $errors = Validator::make($data, $rule);

        if ($errors->fails()) {
            return redirect()->back()->withErrors($errors)->withInput();
        }
        $update = category::find($id);
        $update->name = $req->name;
        $update->save();

        return redirect('/admin/category/');
    }
    public function destory($id)
    {
        $category = Category::where('id', $id);
        $category->delete();
        return redirect('/admin/category/');
    }
    public function show_image($id)
    {
        $images = Image::where('subject_id', $id)->where('type', '3')->get();
        return view('admin.category.image', compact('id', 'images'));
    }

    public function create_image(Request $req, $id)
    {
        $image = new Image();
        $image->type = '3';
        $image->subject_id = $id;

        if ($req->hasFile('image')) {
            $img = $req->file('image');
            $image_name = time() . '.' . $img->getClientOriginalExtension();
            $address = 'image/category/';
            $img->move($address, $image_name);

            $image->image = $address . $image_name;
        }
        $image->save();
        return redirect()->back();
    }
}
