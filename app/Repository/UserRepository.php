<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 05/10/2018
 * Time: 3:41 PM
 */

namespace App\Repository;


interface UserRepository{
    public function findUsers();

    public function findActiveUsers();

    public function findUser($id);

    public function findUserBy($criteria);

    public function saveOrUpdateUser($data);
}