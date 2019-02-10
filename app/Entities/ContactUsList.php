<?php

/**
 * Created by PhpStorm.
 * User: Android
 * Date: 05/10/2018
 * Time: 11:20 AM
 */

namespace  App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Admin
 * @ORM\Entity
 * @ORM\Table(name="contact_us_list")
 */
class ContactUsList
{

    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    private $fullName;

    /**
     * @var string
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    private $subject;

    /**
     * @var string
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $contactNo;

    /**
     * @var string
     * @ORM\Column(type="text",nullable=true)
     */
    private $message;

//    /**
//     * @ORM\ManyToOne(targetEntity="User",  inversedBy="userContactUsList")
//     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
//     */
//    private $userId;

    /**
     * @var string
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getContactNo()
    {
        return $this->contactNo;
    }

    /**
     * @param string $contactNo
     */
    public function setContactNo($contactNo)
    {
        $this->contactNo = $contactNo;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getisActive()
    {
        return $this->isActive;
    }

    /**
     * @param string $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

}