<?php

namespace App\Http\Controllers;
use App\Models\image;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    public function products($cat_id)
    {
        $categories = Category::all();
        $products = Product::where('category_id', $cat_id)->get();
        $images = Image::where('subject_id',$cat_id)->where('type','2')->get();
        return view('user.products', compact('products', 'categories','images'));
    }
    public function product($id)
    {
        $categories = Category::all();
        $product = Product::where('id', $id)->first();
        $images = Image::where('subject_id',$id)->where('type','2')->get();
         return view('user.product', compact('product', 'categories','images'));
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
    public function create_product(Request $req)
    {
        $data = $req->all();
        $rule = [
            'name' => 'required',
            'price' => 'numeric',
            'off' => 'numeric',
            'description' => 'nullable',
            'category_id' => 'required|numeric',
        ];
        $errors = Validator::make($data, $rule);

        if ($errors->fails()) {
            return redirect()->back()->withErrors($errors)->withInput();
        }
        $insert = new product();
        $insert->name = $req->name;
        $insert->price = $req->price;
        $insert->off = $req->off;
        $insert->description = $req->description;
        $insert->category_id = $req->category_id;
        $insert->save();
        return redirect('/admin/product/');
    }
    public function show_update($id)
    {
        $product = product::where('id', $id)->first();
        $categories = DB::table('categories')->get();
        return view('admin.product.update', compact('product', 'categories'));
    }
    public function update_product(Request $req, $id)
    {
        $data = $req->all();
        $rule = [
            'name' => 'required',
            'price' => 'numeric',
            'off' => 'numeric',
            'description' => 'nullable',
            'category_id' => 'required|numeric',
        ];
        $errors = Validator::make($data, $rule);

        if ($errors->fails()) {
            return redirect()->back()->withErrors($errors)->withInput();
        }
        $update = product::find($id);
        $update->name = $req->name;
        $update->price = $req->price;
        $update->off = $req->off;
        $update->description = $req->description;
        $update->category_id = $req->category_id;
        $update->save();
        return redirect('/admin/product/');
    }
    public function destory($id)
    {
        $delete = product::where('id', $id)->first();
        $delete->delete();
        return redirect('/admin/product/');
    }
    public function show_image($id)
    {
        $images = Image::where('subject_id', $id)->where('type', '2')->get();
        return view('admin.product.image', compact('id', 'images'));
    }

    public function create_image(Request $req, $id)
    {
        $image = new Image();
        $image->type = '2';
        $image->subject_id = $id;

        if ($req->hasFile('image')) {
            $img = $req->file('image');
            $image_name = time() . '.' . $img->getClientOriginalExtension();
            $address = 'image/product/';
            $img->move($address, $image_name);

            $image->image = $address . $image_name;
        }
        $image->save();
        return redirect()->back();
    }
}
