<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 05/11/2018
 * Time: 10:47 AM
 */

namespace App\Repository;


interface CmsRepository
{
    public function findCMS();

    public function findCMSById($id);

    public function saveOrUpdate($cms);
}