<?php

namespace App\Http\Controllers\Admin;

use App\Service\CptService;
use App\Service\PageService;
use App\Service\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService,CptService $cptService,PageService $pageService)
    {
        $this->userService=$userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=$this->userService->getActiveUsers();
        return view('admin.list-user',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "firstName" =>"required",
            "email" =>"required",
            "password" =>"required",
            "contactNumber" =>"required"
        ]);
        $result = $this->userService->saveUser($request);
        if($result){
            return redirect()->route('user.index')->with('success-msg','User Added SuccessFully');
        }else{
            return redirect()->route('user.index')->with('error-msg','Something Went Wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=$this->userService->getUser($id);
        return view('admin.user',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            "firstName" =>"required",
            "email" =>"required",
            "contactNumber" =>"required"
        ]);
        $result = $this->userService->updateUser($request,$id);
        if($result){
            return redirect()->route('user.index')->with('success-msg','User Updated SuccessFully');
        }else{
            return redirect()->route('user.index')->with('error-msg','Something Went Wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
