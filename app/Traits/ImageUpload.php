<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 26/10/2018
 * Time: 4:59 PM
 */

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait ImageUpload{
    public function uploadImage(Request $request, $fileName){
        if($request->hasFile('image')){
            $request->file('image');
            $ext = $request->image->extension();
            $file = $fileName.'.'.$ext;
            $request->image->storeAs('public', $file);
            $path = asset(Storage::url($file));
            return $path;
        }
        return false;
    }

    public function uploadMulImage(Request $request, $fileName,$key){
        if($request->hasFile('image')){
            $request->file('image')[$key];
            $ext = $request->image[$key]->extension();
            $file = $fileName.'.'.$ext;
            $request->image[$key]->storeAs('public', $file);
            $path = asset(Storage::url($file));
            return $path;
        }
        return false;
    }
}