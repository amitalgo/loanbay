<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 23/11/2018
 * Time: 10:56 AM
 */

namespace App\Service\Impl;


use App\Entities\DashboardBanner;
use App\Repository\DashboardBannerRepository;
use App\Service\DashboardBannerService;
use App\Traits\ImageUpload;

class DashboardBannerServiceImpl implements DashboardBannerService
{
    use ImageUpload;
    private $dashboardBannerRepo;

    public function __construct(DashboardBannerRepository $dashboardBannerRepo)
    {
        $this->dashboardBannerRepo=$dashboardBannerRepo;
    }

    public function saveDashboardBanner($request)
    {
        $dashboardBanner = new DashboardBanner();
        $dashboardBanner->setShortDesc($request->get('short-desc'));
        if(null!=$request->get('btn-name')){
            $dashboardBanner->setButtonName($request->get('btn-name'));
            $dashboardBanner->setButtonLink($request->get('btn-link'));
        }
        if($request->hasFile('image')) {
            $fileName = time();
            $path = $this->uploadImage($request, $fileName);
            $dashboardBanner->setImage(asset($path));
        }

        $dashboardBanner->setIsActive(1);
        $dashboardBanner->setCreatedAt(new \DateTime());
        $dashboardBanner->setUpdatedAt(new \DateTime());

        return $this->dashboardBannerRepo->saveOrUpdate($dashboardBanner);
    }

    public function getActiveDashboardBanner()
    {
        return $this->dashboardBannerRepo->findActiveDashboardBanner();
    }

    public function getDashboardBanner($id){
        return $this->dashboardBannerRepo->findDashboardBanner($id);
    }

    public function updateDashboardBanner($request,$id){
        $dashboardBanner = $this->dashboardBannerRepo->findDashboardBanner($id);
        $dashboardBanner->setShortDesc($request->get('short-desc'));
        $dashboardBanner->setButtonName($request->get('btn-name'));
        $dashboardBanner->setButtonLink($request->get('btn-link'));

        if($request->hasFile('image')) {
            $fileName = time();
            $path = $this->uploadImage($request, $fileName);
            $dashboardBanner->setImage(asset($path));
        }

        $dashboardBanner->setIsActive($request->get('status'));
        $dashboardBanner->setCreatedAt(new \DateTime());
        $dashboardBanner->setUpdatedAt(new \DateTime());

        return $this->dashboardBannerRepo->saveOrUpdate($dashboardBanner);
    }

    public function getAllDashboardBanner()
    {
        return $this->dashboardBannerRepo->findAllDashboardBanner();
    }
}