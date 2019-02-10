<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 18/01/2019
 * Time: 4:28 PM
 */

namespace App\Service;


interface CptuiService
{
    public function getAllCpiuis();
    public function getCpiuiById($id);
    public function getAllActiveCpiuis();
    public function saveCpiui($data);
    public function updateCpiui($data,$id);
    public function deleteCpiui($id);
    public function getActiveCpiui($id,$title,$image,$description);
    public function getCpiuiByCptId($cptId,$order,$limit);
    public function getCpiuiBySlug($slug);
    public function getCptuiByParent($parent);
}