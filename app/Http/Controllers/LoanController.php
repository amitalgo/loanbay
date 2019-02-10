<?php

namespace App\Http\Controllers;

use App\Service\CptService;
use App\Service\CptuiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoanController extends Controller
{
    private $cptService,$cptuiService;

    public function __construct(CptService $cptService,CptuiService $cptuiService)
    {
        $this->cptService=$cptService;
        $this->cptuiService=$cptuiService;
    }

    public function index(){

    }

    public function fetchLoanBySlug($slug){
        $parent = $this->cptuiService->getCpiuiBySlug($slug);
        $loans = $this->cptuiService->getCptuiByParent($parent->getId());
        return view('front-end.loans',compact('loans','parent'));
    }

    public function fetchLoanDetailsByCptuiId(Request $request){
        $details = $this->cptuiService->getCpiuiById($request->get('id'));
        $user = Auth::user();
        Mail::send(['html'=>'mail.'.$request->get('type')],['user'=>$user,'data'=>$details],function($message) use ($request){
            if($request->get('type')=='requestcall'){
                $message->to('amitc@technople.in','To Admin')->subject('LoanBay : Requested For Call');
            }else{
                $message->to(Auth::user()->getEmail(),'LoanBay')->subject('LoanBay : Find Your Details');
            }

            $message->from('amitc@technople.in','LoanBay');
        });

        return 1;
    }
}
