<?php

namespace App\Http\Controllers\Admin;

use App\Service\AdminRoleService;
use App\Service\CptService;
use App\Service\PageService;
use App\Service\RoleService;
use App\Service\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Service\AdminService;
use Validator;

class AdminController extends Controller
{

    private $adminService,$adminRoleService,$roleService;

    public function __construct(AdminService $adminService,CptService $cptService,AdminRoleService $adminRoleService,RoleService $roleService,PageService $pageService){
        $this->adminService = $adminService;
        $this->adminRoleService = $adminRoleService;
        $this->roleService=$roleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = $this->adminService->getActiveUsers();
        return view('admin.list-sub-admin',compact('admins'));
    }

    public function account(){
        $user = Auth::user();
        return view('admin.user-account', compact('user'));
    }

    public function accountUpdate(Request $request){
        $admin = Auth::user();
        $id = $admin->getId();
        $result = $this->adminService->updateAdmin( $request, $id);
        return $this->redirect('admin.account', $result, 'Account updated successfully');
    }

    public function changePassword(){
        return view('admin.change-password');
    }

    public function updatePassword(Request $request){
        $user = Auth::user();
        $id = $user->getId();
        $result = $this->adminService->updatePassword($request, $id);
        return $this->redirect('admin.account.change-password', $result, 'Password updated successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleService->getActiveRoles();
        return view('admin.create-sub-admin',compact('roles'));
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
            "first-name" =>"required",
            "email" =>"required",
            "password" =>"required",
            "cpassword" =>"required",
            "contact" =>"required"
        ]);
         $result  = $this->adminService->saveAdmin($request);
        if($result){
            return redirect()->route('sub-admin.create')->with('success-msg','Admin Added SuccessFully');
        }else{
            return redirect()->route('sub-admin.create')->with('error-msg','Something Went Wrong');
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
        $admin = $this->adminService->getAdminById($id);
        $roles = $this->roleService->getActiveRoles();
        return view('admin.create-sub-admin',compact('roles','admin'));
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
        Validator::make($request->all(),[
            "first-name" =>"required",
            "email" =>"required",
            "contact" =>"required"
        ]);
        $result = $this->adminService->updateAdmin($request,$id);
        if($result){
            return redirect()->route('sub-admin.index')->with('success-msg','Admin Updated SuccessFully');
        }else{
            return redirect()->route('sub-admin.index')->with('error-msg','Something Went Wrong');
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
