<?php

namespace App\Http\Controllers\Admin;

use App\Service\CptService;
use App\Service\PageService;
use App\Service\QuestionariesService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionariesController extends Controller
{
    public $questionariesService;

    public function __construct(QuestionariesService $questionariesService,CptService $cptService,PageService $pageService)
    {
        $this->questionariesService=$questionariesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionaries = $this->questionariesService->getAllQuestionaries();
        return view('admin.list-questionaries',compact('questionaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questionaries');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->questionariesService->saveQuestionaries($request);
        if($result){
            return redirect()->route('question.index')->with('success-msg','Questionaries Added SuccessFully');
        }else{
            return redirect()->route('question.index')->with('error-msg','Something Went Wrong');
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
        $questionaries = $this->questionariesService->getQuestionariesById($id);
        return view('admin.questionaries',compact('questionaries'));
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
        $result= $this->questionariesService->updateQuestionariesById($request,$id);
        if($result){
            return redirect()->route('question.index')->with('success-msg','Questionaries Updated SuccessFully');
        }else{
            return redirect()->route('question.index')->with('error-msg','Something Went Wrong');
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
