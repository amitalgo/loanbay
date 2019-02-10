<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 05/10/2018
 * Time: 3:41 PM
 */

namespace App\Repository\Impl;


use App\Repository\UserRepository;
use Doctrine\ORM\EntityRepository;

class UserRepositoryImpl extends EntityRepository implements UserRepository{

    public function findUsers(){
        // TODO: Implement findUsers() method.
    }

    public function findActiveUsers(){
        return $this->findAll();
    }

    public function findUser($id){
        return $this->find($id);
    }

    public function saveOrUpdateUser($data){
        try{
            $this->_em->persist($data);
            $this->_em->flush();
            return true;
        }catch (\Exception $e){
            dd($e);
            return false;
        }
    }

    public function findUserBy($criteria){
        return $this->findOneBy($criteria);
    }
}