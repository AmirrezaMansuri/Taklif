<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;
class UserController extends Controller
{
    public function table()
    {
        $users = DB::table('users')->get();
        return view('admin.user.view', compact('users'));
    }
    public function show_create()
    {
        return view('admin.user.create');
    }
    public function create_user()
    {
        DB::table('users')->insert([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password'),
        ]);
        return redirect('/admin/user/');
    }

    public function show_update($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('admin.user.update', compact('user'));
    }
    public function update_user()
    {
    }
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('/admin/user');
    }
}
