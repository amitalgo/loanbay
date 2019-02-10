<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 01/11/2018
 * Time: 2:00 PM
 */

namespace App\Service\Impl;

use App\Entities\ContactUsList;
use App\Helper\FileUploadHelper;
use App\Repository\EnquiryRepository;
use App\Repository\UserRepository;
use App\Service\EnquiryService;
use Illuminate\Support\Facades\Mail;

class EnquiryServiceImpl extends FileUploadHelper implements EnquiryService
{
    private $enquiryRepository;
    private $userRepositoy;
    
    public function __construct(EnquiryRepository $enquiryRepository, UserRepository $userRepository)
    {
        $this->enquiryRepository=$enquiryRepository;
        $this->userRepository = $userRepository;
    }

    public function getAllEnquiries(){
        return $this->enquiryRepository->findAllEnquiries();
    }

    public function getEnquiryById($request){
        return $this->enquiryRepository->findEnquiryById($request->get('enquiryId'));
    }
    
    public function saveEnquiry($request){
        $enquiry = new ContactUsList();
        $enquiry->setFullName($request->get('fullname'));
        $enquiry->setEmail($request->get('email'));
        $enquiry->setSubject($request->get('subject'));
        $enquiry->setContactNo($request->get('contactNumber'));
        $enquiry->setMessage($request->get('message'));
        $enquiry->setIsActive(1);
        $enquiry->setCreatedAt(new \DateTime('now'));
        $enquiry->setUpdatedAt(new \DateTime('now'));
        Mail::send(['html'=>'mail.contactmail'],['data'=>$request],function($message) use ($request){
            $message->to('amitc@technople.in','To Admin')->subject('LoanBay : Contact');
            $message->cc(['amitc588@gmail.com']);
            $message->from('amitc@technople.in','LoanBay');
        });
        return $this->enquiryRepository->saveOrUpdateEnquiry($enquiry);
    }

}