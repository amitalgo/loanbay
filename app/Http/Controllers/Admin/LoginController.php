<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{

    public function login(){
        if(Auth::guard('admin')->check()){
            return Redirect::route('admin.dashboard');
        }

        $name  = 'Amit';

        return view('admin.login',compact('name'));
    }


    public function doLogin(Request $request){
        $loginData = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );
        if(Auth::guard('admin')->attempt($loginData)) {
            return Redirect::route('admin.dashboard');
        }
        return Redirect::back();
    }

    public function logout(){
        Auth::logout();
        return Redirect::route('admin.login');
    }
}
