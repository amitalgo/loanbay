<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 08/10/2018
 * Time: 2:56 PM
 */

namespace App\Repository;


interface PageRepository{
    public function findPages();

    public function findActivePages();

    public function findPage($id);

    public function saveOrUpdatePage($data);

    public function findPageBySlug($slug);
}