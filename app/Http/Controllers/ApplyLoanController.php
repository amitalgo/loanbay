<?php

namespace App\Http\Controllers;

use App\Service\CptuiService;
use App\Service\QuestionariesService;
use Illuminate\Http\Request;

class ApplyLoanController extends Controller
{

    private $cptuiService,$questionariesService;

    public function __construct(CptuiService $cptuiService,QuestionariesService $questionariesService)
    {
        $this->cptuiService=$cptuiService;
        $this->questionariesService = $questionariesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $cptui = $this->cptuiService->getCpiuiBySlug($slug);
//        dd($cptui->getCptuiQuestion()[1]->getQuestionaries()->getQuestionText());
        return view('front-end.apply',compact('cptui','slug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$slug)
    {
        
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
        //
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
        //
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
