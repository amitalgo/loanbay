<?php

namespace App\Http\Controllers;

use App\Service\PageService;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class AboutController extends Controller
{
    private $pageService;

    public function __construct(PageService $pageService){
        $this->pageService=$pageService;
    }

    public function index(){
        dd('about us');
    }
}
