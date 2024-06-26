<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;
use Validator;
use App\Models\user;
use Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function show_register()
    {
        return view("auth.register");
    }
    public function register(Request $req)
    {
        $data = $req->all();
        $rule = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',

        ];
        $errors = validator::make($data, $rule);
        if ($errors->fails()) {
            return redirect()->back()->withErrors($errors)->withinput();
        }
        $user = Role::where('name','user')->first();
        $insert = new User();
        $insert->name = $req->name;
        $insert->email = $req->email;
        $insert->password = bcrypt($req->password);
        $insert->save();
        $insert->addRole($user);
        return redirect('auth/login');
    }
    public function show_login()
    {
        return view('auth.login');
    }
    public function login(Request $req)
    {
        $user = User::where('name', $req->name)->first();
        if($user){
        if (Hash::check($req->password, $user->password)) {
            Auth::login($user);
            return redirect('/');
        }}
        return redirect()->back();
    }
    public function logout(){
        Auth::logout();
        return redirect('/auth/login');
    }
}
