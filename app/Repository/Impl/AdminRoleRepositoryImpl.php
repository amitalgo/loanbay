<?php

namespace App\Repository\Impl;

use App\Repository\AdminRoleRepository;
use Doctrine\ORM\EntityRepository;
class AdminRoleRepositoryImpl extends EntityRepository implements AdminRoleRepository{

    public function findActiveAdminRoleById($id){
    dd($this->find($id));
}

    public function deleteExistingAdminRole($id){
        $adminRoles = $this->findBy(['adminId'=>$id]);
        foreach($adminRoles as $adminRole){
            $this->_em->remove($adminRole);
        }
        $this->_em->flush();
    }
}
