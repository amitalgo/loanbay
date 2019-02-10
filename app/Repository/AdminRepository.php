<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 05/10/2018
 * Time: 3:41 PM
 */

namespace App\Repository;


interface AdminRepository{
    public function findUsers();

    public function findActiveUsers();

    public function findAdminById($id);

    public function saveOrUpdateAdmin($data);
}