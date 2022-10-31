<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function register(){
        $data['title'] = 'Register';
        return view('frondend/register', $data);
    }
    public function register_action(Request $request){
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:tb_user',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        $user = new User([
            'name'=>$request->name,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
        ]);
        $user->save();
        return redirect()->route('login')->with('success', 'Resstration Success. Please Lgin!');
    }
    //
    public function login(){
        $data['title'] = 'Login';
        if(auth()->check()){
            return redirect()->to('homeAdmin');
        }
        return view('admin/login', $data);
    }
    public function login_action(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt(['username'=>$request->username, 'password'=>$request->password])){
            $request->session()->regenerate();
            return redirect()->intended('/homeAdmin');
        }
        return back()->withErrors('Password', 'Wrong username or pasword!');
    }
}
