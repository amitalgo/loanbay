<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 22/11/2018
 * Time: 2:29 PM
 */

namespace App\Repository;


interface UserRoleDetailRepository
{
    public function saveOrUpdateUserRoleDetail($data);

    public function findActiveRoleDetail();

    public function findUserRolesDetById($id);

    public function deleteUserRoleDetailImage($id);
}