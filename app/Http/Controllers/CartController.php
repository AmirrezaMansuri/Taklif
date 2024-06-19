<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function create(Request $req)
    {
        $insert = new Cart();
        $insert->user_id=$req->Auth::user()->name;
        $insert->save();

        Cart::all();


    }
}
