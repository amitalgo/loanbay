<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 01/11/2018
 * Time: 2:00 PM
 */

namespace App\Service;


interface EnquiryService
{
    public function getAllEnquiries();

    public function getEnquiryById($request);
    
    public function saveEnquiry($request);

}