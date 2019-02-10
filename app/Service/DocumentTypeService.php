<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 23/01/2019
 * Time: 5:58 PM
 */

namespace App\Service;


interface DocumentTypeService
{
    public function getDocumentTypeById($id);

    public function getAllDocumentType();

    public function saveDocumentType($data);

    public function updateDocumentType($data,$id);

    public function getActiveDocumentType();
}