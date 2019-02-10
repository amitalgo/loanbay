<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 08/10/2018
 * Time: 2:56 PM
 */

namespace App\Repository\Impl;


use App\Repository\PageRepository;
use Doctrine\ORM\EntityRepository;
use Mockery\Exception;

class PageRepositoryImpl extends EntityRepository implements PageRepository{

    public function findPages(){
        return $this->findAll();
    }

    public function findActivePages(){
        return $this->findBy(['isActive'=>'1']);
    }

    public function findPage($id)
    {
        return $this->find($id);
    }

    public function saveOrUpdatePage($data)
    {
        try{
            $this->_em->persist($data);
            $this->_em->flush();
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    public function findPageBySlug($slug){
        return $this->findOneBy(['isActive'=>'1','slug'=>$slug]);
    }
}