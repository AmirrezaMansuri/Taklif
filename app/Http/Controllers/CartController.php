<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show()
    {
        $user = Auth::user()->id;
        $cart = Cart::where('user_id', $user)->where('status', 0)->first();
        $cart_products = CartProduct::where('cart_id', $cart->id)->get();
        foreach ($cart_products as $cart_product) {
            $product = Product::where('id', $cart_product->product_id)->first();
            $cart_product['product'] = $product;
        }
        return view('user.cart', compact('cart_products'));
    }
    public function create_user($id)
    {

        $user = Auth::user()->id;
        $cart = Cart::where('user_id', $user)->where('status', '0')->first();
        if (!$cart) {
            $cart = new Cart();
            $cart->user_id = $user;
            $cart->status = '0';
            $cart->save();
        }
        $cart_product = new CartProduct();
        $cart_product->cart_id = $cart->id;
        $cart_product->product_id = $id;
        $cart_product->save();
        return redirect()->back();
    }
}
