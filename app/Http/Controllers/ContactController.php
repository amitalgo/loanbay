<?php

namespace App\Http\Controllers;

use App\Service\EnquiryService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $enquiryService;

    public function __construct(EnquiryService $enquiryService){
        $this->enquiryService=$enquiryService;
    }

    public function index(){
        return view('front-end.contact');
    }

    public function send(Request $request){
        $result = $this->enquiryService->saveEnquiry($request);
        if($result){
            return redirect()->route('contact.index')->with('alert', 'Thank you for contacting Us');
        }else{
            return redirect()->back()->with('alert', ' Something went wrong.');
        }
    }
}
