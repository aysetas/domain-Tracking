<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public  function login(){
        return view('back.login.index');
    }
    public function loginPost(UserSaveRequest $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('domain.index');
        }
        else{
            return redirect()->route('login.index')->withErrors('Email Adresi vaya şifre Hatalı!');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login.index');
    }
}
