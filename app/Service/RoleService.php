<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 01/11/2018
 * Time: 4:52 PM
 */

namespace App\Service;


interface RoleService
{
    public function getActiveRoles();

    public function saveRole($data);

    public function getActiveRoleById($id);

    public function updateRole($data,$id);
}