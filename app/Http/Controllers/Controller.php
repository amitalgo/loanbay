<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function redirect($location, $flag, $message){
        $class = 'alert-danger';
        if($flag){
            $class = 'alert-primary';
        }
        return redirect()->route($location)->with(['message'=>$message, 'class'=>$class]);
    }
}
