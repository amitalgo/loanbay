<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 01/11/2018
 * Time: 4:52 PM
 */

namespace App\Service\Impl;


use App\Entities\Role;
use App\Helper\FileUploadHelper;
use App\Repository\RoleRepository;
use App\Service\CptService;
use App\Service\RoleService;

class RoleServiceImpl extends FileUploadHelper implements RoleService
{
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository,CptService $cptService)
    {
        $this->roleRepository=$roleRepository;
    }

    public function getActiveRoles(){
        return $this->roleRepository->findActiveRoles();
    }

    public function saveRole($data){
        $role = new Role();
        $role->setRole($data->get('role-name'));
        $role->setPermission(json_encode($data->get('permission'),JSON_FORCE_OBJECT));
        $role->setIsActive($data->get('status'));
        $role->setCreatedAt(new \DateTime());
        $role->setUpdatedAt(new \DateTime());

        return $this->roleRepository->saveOrUpdateRole($role);
    }

    public function getActiveRoleById($id){
        return $this->roleRepository->findActiveRoleById($id);
    }

    public function updateRole($data,$id){
        $roles = $this->roleRepository->findActiveRoleById($id);
        $roles->setRole($data->get('role-name'));
        $roles->setIsActive($data->get('status'));
        $roles->setPermission(json_encode($data->get('permission'),JSON_FORCE_OBJECT));
        $roles->setUpdatedAt(new \DateTime());

        return $this->roleRepository->saveOrUpdateRole($roles);
    }

}