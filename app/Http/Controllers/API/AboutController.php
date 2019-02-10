<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\CmsService;

class AboutController extends Controller
{

    private $cmsService;
    
    public function __construct(CmsService $cmsService){
        $this->cmsService = $cmsService;
    }
    
    public function getAboutUs(){
        $aboutUs = $this->cmsService->getCMSById(1);
        return response()->json($aboutUs->getContent(), 200);
    }
}
