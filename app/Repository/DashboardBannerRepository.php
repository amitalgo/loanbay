<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 23/11/2018
 * Time: 10:57 AM
 */

namespace App\Repository;


interface DashboardBannerRepository
{
    public function saveOrUpdate($data);

    public function findActiveDashboardBanner();

    public function findDashboardBanner($id);

    public function findAllDashboardBanner();
}