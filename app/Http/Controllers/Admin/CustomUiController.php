<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomUiController extends Controller{


    public function __construct(){

    }

    public function index(){
        $customuis = array();
        return view('admin.custom-uis', compact('customuis'));
    }

    public function create(){
        return view('admin.custom-ui');
    }

    public function edit($id){

    }

    public function store(Request $request){

    }

    public function update(Request $rquest, $id){

    }
}
