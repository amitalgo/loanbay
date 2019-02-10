<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 22/11/2018
 * Time: 2:34 PM
 */

namespace App\Service\Impl;


use App\Repository\UserRoleRepository;
use App\Service\UserRoleService;

class UserRoleServiceImpl implements UserRoleService
{
    private $userRoleRepository;

    public function __construct(UserRoleRepository $userRoleRepository)
    {
        $this->userRoleRepository=$userRoleRepository;
    }

    public function getActiveUserRole()
    {
        return $this->userRoleRepository->findActiveUserRole();
    }
}