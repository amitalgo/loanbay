<?php

namespace App\Http\Controllers\Admin;

use App\Service\PageService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Service\CptService;
use App\Repositories\CptRepositoryImpl;
class CptController extends Controller
{

    private $cptService,$checkPermissionService,$landingPageService;
    public function __construct(CptService $cptService,PageService $pageService)
    {
        $this->cptService = $cptService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cpts = $this->cptService->getAllCpts();
       return view('admin.list-cpt', compact('cpts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cpt',compact('cpts'));
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
            "title" =>"required",
        ]);

        $result  = $this->cptService->saveCpt($request);

        if($result){
            return redirect()->route('cpt.index')->with('success-msg', 'Detail added successfully.');
        }else{
            return redirect()->route('cpt.create')->with('error-msg', 'Please check the form and submit again.');
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
        $cpts = $this->cptService->getCptById($id);
        return view('admin.cpt',compact('cpts'));
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
            "title" =>"required",
        ]);

        $result  = $this->cptService->updateCpt($request,$id);

        if($result){
            return redirect()->route('cpt.edit',['cpt'=>$id])->with('success-msg', 'Updated Successfully.');
        }else{
            return redirect()->route('cpt.edit',['cpt'=>$id])->with('error-msg', 'Please check the form and submit again.');
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
