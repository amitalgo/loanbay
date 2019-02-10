<?php

/**
 * Created by PhpStorm.
 * User: Android
 * Date: 05/10/2018
 * Time: 11:20 AM
 */

namespace  App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Passport\HasApiTokens;


/**
 * Class User
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User implements Authenticatable
{

//    use HasApiTokens;
    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    private $firstName;

    /**
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $lastName;


    /**
     * @var string
     * @ORM\Column(type="string", length=100, unique=true)
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $profileImage;

    /**
     * @var string
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $aadharNo;

    /**
     * @var string
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $panNo;

    /**
     * @var string
     * @ORM\Column(type="bigint",nullable=true)
     */
    private $contactNumber;

    /**
     * @var string
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $location;

    /**
     * @var string
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $address;

    /**
     * @var string
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $state;

    /**
     * @var string
     * @ORM\Column(type="boolean")
     */
    private $isActive;


    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $rememberToken;

    /**
     * @var datetime $createdAt
     *
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @var datetime $updatedAt
     *
     * @ORM\Column(type="datetime", nullable = true)
     */
    protected $updatedAt;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="UserInfo", fetch="EAGER", mappedBy="user", cascade={"persist"})
     */
    private $userInfo;

    /**
     * @ORM\ManyToOne(targetEntity="UserRole")
     * @ORM\JoinColumn(name="user_role", referencedColumnName="id")
     */
    private $userRole;

//    /**
//     * @ORM\OneToMany(targetEntity="ContactUsList", fetch="EAGER",mappedBy="userId",cascade={"persist"})
//     */
//    private $userContactUsList;

    /**
     * @ORM\OneToMany(targetEntity="Notification", fetch="EAGER",mappedBy="userId",cascade={"persist"})
     */
    private $userNotification;

    /**
     * @ORM\OneToMany(targetEntity="NotificationUserDevice", fetch="EAGER",mappedBy="userId",cascade={"persist"})
     */
    private $userDevice;

    /**
     * @ORM\OneToMany(targetEntity="CptuiQuestionariesAnswers", fetch="EAGER",mappedBy="userId",cascade={"persist"})
     */
    private $cptuiQuestionAnswer;

    public function __construct(){
        $this->userInfo = new ArrayCollection();
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->id;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->rememberToken;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }

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
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
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

    /**
     * @return string
     */
    public function getProfileImage()
    {
        return $this->profileImage;
    }

    /**
     * @param string $profileImage
     */
    public function setProfileImage($profileImage)
    {
        $this->profileImage = $profileImage;
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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Gets triggered only on insert

     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->createdAt = new \DateTime("now");
    }

    /**
     * Gets triggered every time on update

     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->updatedAt = new \DateTime("now");
    }

    public function getKey() {
        return $this->getId();
    }

    /**
     * @return ArrayCollection
     */
    public function getUserInfo()
    {
        return $this->userInfo;
    }

    /**
     * @param ArrayCollection $userInfo
     */
    public function setUserInfo(ArrayCollection $userInfo)
    {
        $this->userInfo = $userInfo;
    }

    /**
     * @return mixed
     */
    public function getUserRole()
    {
        return $this->userRole;
    }

    /**
     * @param mixed $userRole
     */
    public function setUserRole($userRole)
    {
        $this->userRole = $userRole;
    }

    public function addUserInfo(UserInfo $userInfo){
        $userInfo->setUser($this);
        $this->userInfo->add($userInfo);
    }

    /**
     * @return string
     */
    public function getContactNumber()
    {
        return $this->contactNumber;
    }

    /**
     * @param string $contactNumber
     */
    public function setContactNumber($contactNumber)
    {
        $this->contactNumber = $contactNumber;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return datetime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getAadharNo()
    {
        return $this->aadharNo;
    }

    /**
     * @param string $aadharNo
     */
    public function setAadharNo($aadharNo)
    {
        $this->aadharNo = $aadharNo;
    }

    /**
     * @return string
     */
    public function getPanNo()
    {
        return $this->panNo;
    }

    /**
     * @param string $panNo
     */
    public function setPanNo($panNo)
    {
        $this->panNo = $panNo;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getUserContactUsList()
    {
        return $this->userContactUsList;
    }

    /**
     * @param mixed $userContactUsList
     */
    public function setUserContactUsList($userContactUsList)
    {
        $this->userContactUsList = $userContactUsList;
    }

    /**
     * @return mixed
     */
    public function getUserNotification()
    {
        return $this->userNotification;
    }

    /**
     * @param mixed $userNotification
     */
    public function setUserNotification($userNotification)
    {
        $this->userNotification = $userNotification;
    }

    /**
     * @return mixed
     */
    public function getUserDevice()
    {
        return $this->userDevice;
    }

    /**
     * @param mixed $userDevice
     */
    public function setUserDevice($userDevice)
    {
        $this->userDevice = $userDevice;
    }

    /**
     * @return mixed
     */
    public function getCptuiQuestionAnswer()
    {
        return $this->cptuiQuestionAnswer;
    }

    /**
     * @param mixed $cptuiQuestionAnswer
     */
    public function setCptuiQuestionAnswer($cptuiQuestionAnswer)
    {
        $this->cptuiQuestionAnswer = $cptuiQuestionAnswer;
    }

}