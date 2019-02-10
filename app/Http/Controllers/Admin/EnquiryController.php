<?php

namespace App\Http\Controllers\Admin;

use App\Service\CptService;
use App\Service\EnquiryService;
use App\Service\PageService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class EnquiryController extends Controller
{
    private $enquiryService;

    public function __construct(EnquiryService $enquiryService,CptService $cptService,PageService $pageService)
    {
        $this->enquiryService=$enquiryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquiries=$this->enquiryService->getAllEnquiries();
        return view('admin.list-enquiries',compact('enquiries'));
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
    public function store(Request $request)
    {
        //
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

    public function getEnquiryById(Request $request){
        $enquiryDet=$this->enquiryService->getEnquiryById($request);
        return json_encode(['sub'=>$enquiryDet->getSubject(),'date'=>$enquiryDet->getCreatedAt(),'name'=>$enquiryDet->getFullName(),'email'=>$enquiryDet->getEmail(),'contact'=>$enquiryDet->getContactNo(),'msg'=>$enquiryDet->getMessage()]);
    }
}
