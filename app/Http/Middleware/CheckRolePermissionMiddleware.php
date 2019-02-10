<?php

namespace App\Http\Middleware;

use App\Service\AdminService;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class CheckRolePermissionMiddleware
{
    private $adminService;
    public function __construct(AdminService $adminService)
    {
        $this->adminService=$adminService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $adminId = Auth::user()->getId();
        $isAdmin = Auth::user()->getisSuperUser();
        if($isAdmin){
            return $next($request);
        }else{
            $route = $request->route()->getName();
            $adminObj = $this->adminService->getAdminById($adminId);
            $permission=[];
            foreach ($adminObj->getAdminRole() as $roles){
                $permission=$roles->getRoleId()->getPermission();
            }
            $routeArray = json_decode($permission,JSON_UNESCAPED_SLASHES);
            if(in_array($route,$routeArray)){
                return $next($request);
            }
            return Response::view('admin.unauthorized-page', [], 403);
        }
    }
}
