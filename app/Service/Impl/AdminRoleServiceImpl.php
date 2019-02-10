<?php


namespace App\Service\Impl;

use App\Helper\FileUploadHelper;
use App\Repository\AdminRoleRepository;
use App\Service\AdminRoleService;

class AdminRoleServiceImpl extends FileUploadHelper implements  AdminRoleService{

    private $adminRoleRepository;

    public function __construct(AdminRoleRepository $adminRoleRepository)
    {
        $this->adminRoleRepository=$adminRoleRepository;
    }

}