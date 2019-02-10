<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 05/10/2018
 * Time: 3:41 PM
 */

namespace App\Repository\Impl;


use App\Repository\AdminRepository;
use Doctrine\ORM\EntityRepository;

class AdminRepositoryImpl extends EntityRepository implements AdminRepository{

    public function findUsers(){
        // TODO: Implement findUsers() method.
    }

    public function findActiveUsers(){
        return $this->findAll();
    }

    public function findAdminById($id){
        return $this->find($id);
    }

    public function saveOrUpdateAdmin($data){
        try{
            $this->_em->persist($data);
            $this->_em->flush();
            return true;
        }catch (\Exception $e){
            return false;
//            dd($e);
        }
    }

}