<?php

namespace App\Http\Controllers\Admin;


use App\Service\CptService;
use App\Service\PageService;
use App\Service\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private $userService,$cptService;

    public function __construct(UserService $userService,CptService $cptService,PageService $pageService)
    {
        $this->userService=$userService;
        $this->cptService=$cptService;
    }

    public function index(){
        $users=count($this->userService->getActiveUsers());
        return view('admin.dashboard',compact('users'));
    }
}
