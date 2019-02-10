<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 18/01/2019
 * Time: 12:18 PM
 */

namespace App\Repository;


interface CptRepository
{
    public function findAllCpts();

    public function findCptById($id);

    public function findAllActiveCpts();

    public function saveOrUpdate($cpt);

    public function deleteCpt($id);

    public function findCptBySlug($slug);
}