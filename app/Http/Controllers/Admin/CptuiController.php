<?php

namespace App\Http\Controllers\Admin;

use App\Service\CptService;
use App\Service\CptuiService;
use App\Service\DocumentTypeService;
use App\Service\PageService;
use App\Service\QuestionariesService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CptuiController extends Controller
{
    public $cptService,$cptuiService,$documentTypeService,$questionariesService;

    public function __construct(CptService $cptService,CptuiService $cptuiService,DocumentTypeService $documentTypeService,QuestionariesService $questionariesService,PageService $pageService)
    {
        $this->cptService=$cptService;
        $this->cptuiService=$cptuiService;
        $this->questionariesService=$questionariesService;
        $this->documentTypeService=$documentTypeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $cptsBySlug = $this->cptService->getAllBySlug($slug);
        return view('admin.list-cptui', compact('cptsBySlug', 'slug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug){
        $questions = $this->questionariesService->getAllActiveQuestionaries();
        $documents = $this->documentTypeService->getActiveDocumentType();
        $parents = $this->cptService->getAllBySlug($slug);
        $attr=(json_decode(($parents->getAttribute()),true ));
        return view('admin.cptui', compact('parents', 'attr','slug','questions','documents'));
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
            "description"=>"required"
        ]);

        $result  = $this->cptuiService->saveCpiui($request);
        if($result){
            return redirect('/admin/cptui/list/'.$request->input('slug'))->with('success-msg', 'Detail added successfully.');
        }else{
            return redirect('/admin/cptui/add/'.$request->input('slug'))->with('error-msg', 'Please check the form and submit again.');
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


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cpiui = $this->cptuiService->getCpiuiById($id);
        $questions = $this->questionariesService->getAllActiveQuestionaries();
        $documents = $this->documentTypeService->getActiveDocumentType();
//        dd($cpiui->getcptuiQuestion()[0]->getQuestionaries()->getId());
        $slug=$cpiui->getCptId()->getSlug();
        $parents = $this->cptService->getCptById($cpiui->getCptId()->getId());
        $attr=(json_decode(($parents->getAttribute()),true ));
        $cpiuiAttr = json_decode($cpiui->getAttribute(),true);
        return view('admin.cptui',compact('cpiui','slug','parents','attr','cpiuiAttr','questions','documents'));
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
            "description" =>"required"
        ]);

        $result  = $this->cptuiService->updateCpiui($request,$id);
        if($result){
            return redirect()->route('cptui.edit',['cpiui'=>$id])->with('success-msg', ' Cptui updated successfully.');
        }else{
            return redirect()->route('cptui.edit',['cpiui'=>$id])->with('error-msg', 'Please check the form and submit again.');
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
