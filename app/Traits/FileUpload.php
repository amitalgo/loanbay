<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 02/11/2018
 * Time: 4:46 PM
 */

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait FileUpload{
    public function uploadFile(Request $request, $fileName){
        if($request->hasFile('file')){
            $request->file('file');
            $ext = $request->file->extension();
            $file = $fileName.'.'.$ext;
            $request->file->storeAs('public', $file);
            $path = asset(Storage::url($file));
            return $path;
        }
        return false;
    }
}