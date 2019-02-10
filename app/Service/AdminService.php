<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 05/10/2018
 * Time: 3:49 PM
 */

namespace App\Service;


interface AdminService{

    public function getUsers();

    public function getActiveUsers();

    public function getAdminById($id);

    public function saveAdmin($request);

    public function updateAdmin($request, $id);

    public function updatePassword($request, $id);

}