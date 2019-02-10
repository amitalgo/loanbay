<?php

namespace App\Http\Controllers;

use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService=$userService;
    }

    public function create(){
        return view('front-end.register');
    }

    public function store(Request $request){
        $result = $this->userService->saveUser($request);
        if($result){
            return view('front-end.login');
        }else{
            return Redirect::back();
        }
    }
}
