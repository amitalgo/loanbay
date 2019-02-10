<?php

namespace App\Http\Controllers;

use App\Service\CptService;
use App\Service\PageService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $pageService,$cptService,$newsController;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PageService $pageService,CptService $cptService)
    {
        $this->pageService=$pageService;
        $this->cptService=$cptService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = $this->pageService->getPageBySlug('about-us');
        $service = $this->pageService->getPageBySlug('service');
        $cpts = $this->cptService->getAllActiveCpts();
        return view('front-end.home',compact('cpts','about','service'));
    }
}
