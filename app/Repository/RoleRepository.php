<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 01/11/2018
 * Time: 4:53 PM
 */

namespace App\Repository;


interface RoleRepository
{
    public function findActiveRoles();

    public function saveOrUpdateRole($role);

    public function findActiveRoleById($id);
}