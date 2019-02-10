<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 22/11/2018
 * Time: 2:28 PM
 */

namespace App\Service;


interface UserRoleDetailService
{
    public function saveUserRoleDetail($request);

    public function getActiveRoleDetail();

    public function getUserRolesDetById($id);

    public function updateUserRoleDetail($data,$id);
}