<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 18/01/2019
 * Time: 12:16 PM
 */

namespace App\Service;


interface CptService
{
    public function getAllCpts();
    public static function getCptById($id);
    public static function getAllActiveCpts();
    public function saveCpt($data);
    public function updateCpt($data,$id);
    public function deleteCpt($id);
    public function getCpt($id);
    public static function getAllBySlug($slug);
}