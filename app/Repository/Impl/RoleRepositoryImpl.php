<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 01/11/2018
 * Time: 4:53 PM
 */

namespace App\Repository\Impl;


use App\Repository\RoleRepository;
use Doctrine\ORM\EntityRepository;

class RoleRepositoryImpl extends EntityRepository implements RoleRepository
{
    public function findActiveRoles(){
        return $this->findAll();
    }

    public function saveOrUpdateRole($role){
        try{
            $this->_em->persist($role);
            $this->_em->flush();
            return true;
        }catch (\Exception $e){
            return false;
//            dd($e);
        }
    }

    public function findActiveRoleById($id){
        return $this->find($id);
    }
}