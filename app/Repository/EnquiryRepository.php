<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 01/11/2018
 * Time: 2:01 PM
 */

namespace App\Repository;


interface EnquiryRepository
{
    public function findAllEnquiries();

    public function findEnquiryById($id);
    
    public function saveOrUpdateEnquiry($data);

}