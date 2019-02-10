<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 22/11/2018
 * Time: 10:10 AM
 */

namespace App\Entities;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class RoleDetail
 * @ORM\Entity
 * @ORM\Table(name="user_role_detail")
 */
class UserRoleDetail
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
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="UserRoleDetailImage", fetch="EAGER", mappedBy="userRoleDetailId",cascade={"persist"})
     */
    private $roleDetailImage;

    /**
     * @ORM\ManyToOne(targetEntity="UserRole")
     * @ORM\JoinColumn(name="users_role_id", referencedColumnName="id")
     */
    private $userRole;

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

    public function __construct()
    {
        $this->roleDetailImage=new ArrayCollection();
    }

    public function addUserRoleDetImg(UserRoleDetailImage $userRoleDetailImage){
        $userRoleDetailImage->setUserRoleDetailId($this);
        $this->roleDetailImage->add($userRoleDetailImage);
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getRoleDetailImage()
    {
        return $this->roleDetailImage;
    }

    /**
     * @param string $roleDetailImage
     */
    public function setRoleDetailImage($roleDetailImage)
    {
        $this->roleDetailImage = $roleDetailImage;
    }

    /**
     * @return string
     */
    public function getUserRole()
    {
        return $this->userRole;
    }

    /**
     * @param string $userRole
     */
    public function setUserRole($userRole)
    {
        $this->userRole = $userRole;
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
}