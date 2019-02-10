<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 26/10/2018
 * Time: 3:30 PM
 */

namespace App\Repository\Impl;


use App\Repository\UserRoleRepository;
use Doctrine\ORM\EntityRepository;

class UserRoleRepositoryImpl extends EntityRepository  implements UserRoleRepository {

    public function findRoleByName($role){
        return $this->findOneBy(['role'=>$role]);
    }

    public function findActiveUserRole(){
        return $this->findBy(['isActive'=>1]);
    }

    public function findRoleById($id)
    {
        return $this->find($id);
    }
}