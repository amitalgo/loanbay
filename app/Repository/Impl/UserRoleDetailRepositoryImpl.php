<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 22/11/2018
 * Time: 2:30 PM
 */

namespace App\Repository\Impl;


use App\Repository\UserRoleDetailRepository;
use Doctrine\ORM\EntityRepository;

class UserRoleDetailRepositoryImpl extends EntityRepository implements UserRoleDetailRepository
{
    public function saveOrUpdateUserRoleDetail($data){
        try{
            $this->_em->persist($data);
            $this->_em->flush();
            return true;
        }catch (\Exception $e){
            dd($e);
            return false;
        }
    }

    public function findActiveRoleDetail()
    {
        return $this->findBy(['isActive'=>1]);
    }

    public function findUserRolesDetById($id)
    {
        return $this->find($id);
    }

    public function deleteUserRoleDetailImage($id)
    {
        $detImages= $this->find($id);
        foreach($detImages->getRoleDetailImage() as $detImage){
            $this->_em->remove($detImage);
        }
        $this->_em->flush();
    }
}