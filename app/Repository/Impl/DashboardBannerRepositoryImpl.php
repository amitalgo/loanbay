<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 23/11/2018
 * Time: 10:57 AM
 */

namespace App\Repository\Impl;


use App\Repository\DashboardBannerRepository;
use Doctrine\ORM\EntityRepository;

class DashboardBannerRepositoryImpl extends EntityRepository implements DashboardBannerRepository
{
    public function saveOrUpdate($data)
    {
        try{
            $this->_em->persist($data);
            $this->_em->flush();
            return true;
        }catch (\Exception $e){
//            dd($e);
            return false;
        }
    }

    public function findActiveDashboardBanner()
    {
        return $this->findBy(['isActive'=>1]);
    }

    public function findDashboardBanner($id)
    {
        return $this->find($id);
    }

    public function findAllDashboardBanner()
    {
        return $this->findAll();
    }
}