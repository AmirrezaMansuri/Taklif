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
        $sum = 0;
        $user = Auth::user()->id;
        $cart = Cart::where('user_id', $user)->where('status', 0)->first();
        if (!$cart) {
            return redirect('/cart/create');
        }
        $cart_products = CartProduct::where('cart_id', $cart->id)->get();
        foreach ($cart_products as $cart_product) {
            $product = Product::where('id', $cart_product->product_id)->first();
            $cart_product['product'] = $product;
            $product['tprice'] = ($product->price * $product->off / 100)*$cart_product->num;
            $sum += $product->tprice  ;
         }
         return view('user.cart', compact('cart_products', 'cart','sum'));
    }
    public function create($id)
    {
        $user = Auth::user()->id;
        $cart = Cart::where('user_id', $user)->where('status', '0')->first();
        if (!$cart) {
            $cart = new Cart();
            $cart->user_id = $user;
            $cart->status = '0';
            $cart->save();
        }
        $has = CartProduct::where('cart_id', $cart->id)->where('product_id', $id)->first();
        if ($has) {
            $num = $has->num;
            $has->num += 1;
            $has->save();
        } else {
            $cart_product = new CartProduct();
            $cart_product->cart_id = $cart->id;
            $cart_product->product_id = $id;
            $cart_product->save();
        }
        return redirect()->back();
    }
    public function delete($cart_id, $prod_id)
    {
        CartProduct::where('cart_id', $cart_id)->where('product_id', $prod_id)->delete();
        return redirect()->back();
    }
    public function payment($cart_id)
    {
        Cart::where('id', $cart_id)->update(['status' => '1']);
    }
}
