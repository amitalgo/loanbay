<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 05/11/2018
 * Time: 10:47 AM
 */

namespace App\Repository\Impl;


use App\Repository\CmsRepository;
use Doctrine\ORM\EntityRepository;

class CmsRepositoryImpl extends EntityRepository implements CmsRepository
{
    public function findCMS()
    {
        return $this->findAll();
    }

    public function findCMSById($id){
        return $this->find($id);
    }

    public function saveOrUpdate($data)
    {
        try{
            $this->_em->persist($data);
            $this->_em->flush();
            return true;
        }catch (\Exception $e){
            return false;
        }
    }
}