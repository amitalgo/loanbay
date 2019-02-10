<?php

namespace App\Http\Controllers\Admin;

use App\Service\PageService;
use App\Service\RoleService;
use App\Service\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Validator;

class RoleController extends Controller
{
    private $roleService;

    public function __construct(RoleService $roleService,UserService $userService,PageService $pageService)
    {
        $this->roleService=$roleService;
    }

    public function allRoutes(){
        $routes = Route::getRoutes();
        $routesArray=[];
        foreach ($routes as $route){
            if($route->getPrefix()=='admin/'){
                if(in_array('DELETE',$route->methods()) || in_array('GET',$route->methods())){
                    $method=$route->getName();
                $routesArray[substr($method,0,strpos($method, "."))][substr($method,strrpos($method, ".")+1)] = ["pageName"=>$route->getName(),"pageMethod"=>substr($method,strpos($method, ".")+1)];
                }
            }
        }
        return $routesArray;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->roleService->getActiveRoles();
        return view('admin.list-role',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routers  = $this->allRoutes();
        return view('admin.role',compact('routers'));
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
            "role-name" =>"required",
            "permission" => "required"
        ]);

        $result = $this->roleService->saveRole($request);
        if($result){
            return redirect()->route('role.index')->with('success-msg','Role Added SuccessFully');
        }else{
            return redirect()->route('role.index')->with('error-msg','Something Went Wrong');
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
        $role = $this->roleService->getActiveRoleById($id);
        $permissions=json_decode($role->getPermission());
        $routers  = $this->allRoutes();
        return view('admin.role',compact('role','permissions','routers'));
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
            "role-name" =>"required"
        ]);
        $result = $this->roleService->updateRole($request,$id);
        if($result){
            return redirect()->route('role.index')->with('success-msg','Role Updated SuccessFully');
        }else{
            return redirect()->route('role.index')->with('error-msg','Something Went Wrong');
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
