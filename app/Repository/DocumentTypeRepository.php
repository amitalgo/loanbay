<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 23/01/2019
 * Time: 5:58 PM
 */

namespace App\Repository;


interface DocumentTypeRepository
{
    public function findDocumentTypeById($id);

    public function findAllDocumentType();

    public function saveOrUpdate($data);

    public function findActiveDocumentType();
}