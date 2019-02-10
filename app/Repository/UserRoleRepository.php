<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 26/10/2018
 * Time: 3:30 PM
 */

namespace App\Repository;


interface UserRoleRepository
{
    public function findRoleByName($role);

    public function findRoleById($id);

    public function findActiveUserRole();
}