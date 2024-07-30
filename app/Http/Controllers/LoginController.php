<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    //Login
    public function postLogin(Request $request)
    {
        $data = $request->only(['email', 'password']);
        //Kiểm tra đăng nhập
        if (Auth::attempt($data)) {
            return redirect()->route('post.index'); //Đăng nhập thành công
        } else {
            //đăng nhập thất bại
            return redirect()->back()->with('errorLogin', 'Email hoặc Password không chính xác');
        }
    }

    public function register()
    {
        return view('register');
    }

    //Register
    public function postRegister(Request $request)
    {
        $data = $request->validate([
            'fullname' => ['required'],
            'username' => ['required', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'passord' => ['required', 'min:3', 'max:50']
        ]);

        User::query()->create($data);
        return redirect()->route('login')->with('message', 'Đăng ký tài khoản thành công');
    }

    //Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
