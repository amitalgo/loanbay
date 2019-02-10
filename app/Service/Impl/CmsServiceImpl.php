<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 05/11/2018
 * Time: 10:45 AM
 */

namespace App\Service\Impl;

use App\Repository\CmsRepository;
use App\Service\CmsService;
use App\Traits\ImageUpload;

class CmsServiceImpl implements CmsService
{
    use ImageUpload;
    private $cmsRepository;

    public function __construct(CmsRepository $cmsRepository)
    {
        $this->cmsRepository=$cmsRepository;
    }

    public function getCMS()
    {
        return $this->cmsRepository->findCMS();
    }

    public function getCMSById($id){
        return $this->cmsRepository->findCMSById($id);
    }

    public function updateCms($request,$id){
        $cms = $this->cmsRepository->findCMSById($id);
        $cms->setTitle($request->get('title'));
        $cms->setSlug($request->get('slug'));
        $cms->setContent($request->get('content'));
        if($request->hasFile('image')) {
            $fileName = $request->get('title').time();
            $path = $this->uploadImage($request,$fileName);
            $cms->setFeatureImg(asset($path));
        }
        return $this->cmsRepository->saveOrUpdate($cms);
    }
}