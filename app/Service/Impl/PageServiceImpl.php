<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 08/10/2018
 * Time: 2:55 PM
 */

namespace App\Service\Impl;


use App\Entities\Page;
use App\Helper\FileUploadHelper;
use App\Repository\PageRepository;
use App\Service\PageService;

class PageServiceImpl extends FileUploadHelper implements PageService{

    public static $pageRepository;

    public function __construct(PageRepository $pageRepository){
        self::$pageRepository = $pageRepository;
    }

    public static function getPages(){
        return self::$pageRepository->findPages();
    }

    public function getActivePages(){
        return self::$pageRepository->findActivePages();
    }

    public function getPage($id){
        return self::$pageRepository->findPage($id);
    }

    public function savePage($request){
        $page = new Page();
        $this->createPageData($request, $page);
        return self::$pageRepository->saveOrUpdatePage($page);
    }

    public function updatePage($request, $id){
        $page = self::$pageRepository->findPage($id);
        $this->createPageData($request, $page);
        return self::$pageRepository->saveOrUpdatePage($page);
    }

    private function createPageData($request, $page){
        $page->setTitle($request->get('title'));
        $page->setContent($request->get('content'));
        $page->setIsActive($request->get('status'));
    }

    public function getPageBySlug($slug){
        return self::$pageRepository->findPageBySlug($slug);
    }
}