<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 23/11/2018
 * Time: 10:55 AM
 */

namespace App\Service;


interface DashboardBannerService
{
    public function saveDashboardBanner($request);

    public function getActiveDashboardBanner();

    public function getDashboardBanner($id);

    public function updateDashboardBanner($request,$id);

    public function getAllDashboardBanner();
}