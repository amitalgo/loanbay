<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Service\EnquiryService;

class EnquiryController extends Controller
{
    private $enquiryService;
    
    public function __construct(EnquiryService $enquiryService){
        $this->enquiryService = $enquiryService;
    }
    
    
    public function saveEnquiry(Request $request){
        $validator = Validator::make($request->all(),[
           'subject'  => 'required',
           'message' => 'required'
        ]);  
        if($validator->fails()){
            return response()->json("Please check the form and submit again.", 400);
        }else {
            $result = $this->enquiryService->saveEnquiry($request, Auth::user()->getId());
            if($result){
                return response()->json("Enquiry submitted successfully.", 200);
            }else{
                return response()->json("Something went wrong.Please try again", 400);
            }
        }
    }
}
