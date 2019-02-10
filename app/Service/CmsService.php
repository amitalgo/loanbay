<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 05/11/2018
 * Time: 10:45 AM
 */

namespace App\Service;


interface CmsService
{
    public function getCMS();

    public function getCMSById($id);

    public function updateCms($request,$id);
}