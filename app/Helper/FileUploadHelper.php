<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 05/10/2018
 * Time: 4:54 PM
 */

namespace App\Helper;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadHelper{
    public function uploadFile(Request $request, $key){
        if($request->hasFile($key)){
            $request->file($key);
            $ext = $request->file($key)->extension();
            $fileName = time().'.'.$ext;
            $request->file($key)->storeAs('public', $fileName);
            $path = asset(Storage::url($fileName));
            return $path;
        }
        return false;
    }
}