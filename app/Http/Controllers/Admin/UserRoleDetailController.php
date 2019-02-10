<?php

namespace App\Http\Controllers\Admin;

use App\Service\CptService;
use App\Service\PageService;
use App\Service\UserRoleDetailService;
use App\Service\UserRoleService;
use App\Service\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRoleDetailController extends Controller
{
    private $userRoleService,$userRoleDetailService;

    public function __construct(UserService $userService,CptService $cptService,UserRoleService $userRoleService,UserRoleDetailService $userRoleDetailService,PageService $pageService)
    {
        $this->userRoleService=$userRoleService;
        $this->userRoleDetailService=$userRoleDetailService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $datas=$this->userRoleDetailService->getActiveRoleDetail();
        return view('admin.list-userRoleDetail',compact('datas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $userRoles=$this->userRoleService->getActiveUserRole();
        return view('admin.userRoleDetail',compact('userRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request,[
            "name" =>"required",
            "role_type"=>"required",
        ]);

        $result = $this->userRoleDetailService->saveUserRoleDetail($request);
        if($result){
            return redirect()->route('userRoleDetail.index')->with('success-msg','User Role Detail Added SuccessFully');
        }else{
            return redirect()->route('userRoleDetail.create')->with('error-msg','Something Went Wrong');
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
        $userRoles=$this->userRoleService->getActiveUserRole();
        $userRolesDet=$this->userRoleDetailService->getUserRolesDetById($id);
//        dd($userRolesDet->getroleDetailImage());
        return view('admin.userRoleDetail',compact('userRoles','userRolesDet'));
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
//        dd($request->all());
        $this->validate($request,[
            "name" =>"required",
            "role_type"=>"required",
        ]);

        $result = $this->userRoleDetailService->updateUserRoleDetail($request,$id);
        if($result){
            return redirect()->route('userRoleDetail.index')->with('success-msg','User Role Detail Updated SuccessFully');
        }else{
            return redirect()->route('userRoleDetail.create')->with('error-msg','Something Went Wrong');
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
