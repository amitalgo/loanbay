<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 26/10/2018
 * Time: 11:29 AM
 */

namespace App\Repository;


interface AdminRoleRepository{
    public function findActiveAdminRoleById($id);

    public function deleteExistingAdminRole($id);
}