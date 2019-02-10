<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 18/01/2019
 * Time: 4:29 PM
 */

namespace App\Repository;


interface CptuiRepository
{
    public function findAllCpiuis();
    public function findCpiuiById($id);
    public function findAllActiveCpiuis();
    public function saveOrUpdateCpiui($data);
    public function deleteCpiui($id);
    public function findCpiuiByCptId($cptId,$order,$limit);
    public function findCpiuiBySlug($slug);
    public function findCpiui($title,$image,$description);
    public function findCptuiByParent($parent);
}