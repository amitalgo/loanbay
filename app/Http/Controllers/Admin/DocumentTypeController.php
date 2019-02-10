<?php

namespace App\Http\Controllers\Admin;

use App\Service\CptService;
use App\Service\DocumentTypeService;
use App\Service\PageService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentTypeController extends Controller
{
    private $documentTypeService;
    public function __construct(DocumentTypeService $documentTypeService,CptService $cptService,PageService $pageService)
    {
        $this->documentTypeService=$documentTypeService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentTypes = $this->documentTypeService->getAllDocumentType();
        return view('admin.list-documentType',compact('documentTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.documentType');
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

        $result = $this->documentTypeService->saveDocumentType($request);
        if($result){
            return redirect()->route('document-type.index')->with('success-msg', 'Detail added successfully.');
        }else{
            return redirect()->route('document-type.create')->with('error-msg', 'Please check the form and submit again.');
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
        $documentData = $this->documentTypeService->getDocumentTypeById($id);
        return view('admin.documentType',compact('documentData'));
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

        $result = $this->documentTypeService->updateDocumentType($request,$id);
        if($result){
            return redirect()->route('document-type.index')->with('success-msg', 'Detail updated successfully.');
        }else{
            return redirect()->route('document-type.edit')->with('error-msg', 'Please check the form and submit again.');
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
