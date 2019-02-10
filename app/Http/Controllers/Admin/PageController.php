<?php

namespace App\Http\Controllers\Admin;

use App\Service\CptService;
use App\Service\PageService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    private $pageService,$cptService;

    public function __construct(PageService $pageService,CptService $cptService){
        $this->pageService = $pageService;
    }

    public function index(){
        $pages = $this->pageService->getPages();
        return view('admin.pages', compact('pages'));
    }

    public function create(){
        $pages = $this->pageService->getActivePages();
        return view('admin.page', compact('pages'));
    }

    public function store(Request $request){
        $result = $this->pageService->savePage($request);
        return $this->redirect('admin.page', $result, 'Page created successfully');
    }

    public function edit($id){
        $page = $this->pageService->getPage($id);
        return view('admin.page', compact( 'page'));
    }

    public function update($id, Request $request){
        $result = $this->pageService->updatePage($request, $id);
        if($result){
            return redirect()->route('page.edit',['id'=>$id])->with('success-msg', 'Page Updated successfully.');
        }else{
            return redirect()->route('page.edit',['id'=>$id])->with('error-msg', 'Please check the form and submit again.');
        }
    }
}
