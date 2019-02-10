<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 25/01/2019
 * Time: 2:43 PM
 */

namespace App\Repository;


interface CptuiDocumentLinkRepository
{
    public function deleteExistingDocument($id);
}