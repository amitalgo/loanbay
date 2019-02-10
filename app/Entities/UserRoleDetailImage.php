<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 22/11/2018
 * Time: 11:04 AM
 */

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class UserRoleDetailImage
 * @ORM\Entity
 * @ORM\Table(name="user_role_detail_image")
 */
class UserRoleDetailImage
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="UserRoleDetail")
     * @ORM\JoinColumn(name="user_role_detail_id", referencedColumnName="id")
     */
    private $userRoleDetailId;

    /**
     * @var string
     * @ORM\Column(type="string", length=150,nullable=true)
     */
    private $image;

    /**
     * @var string
     * @ORM\Column(type="string", length=150)
     */
    private $shortDesc;

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
     * @return mixed
     */
    public function getUserRoleDetailId()
    {
        return $this->userRoleDetailId;
    }

    /**
     * @param mixed $userRoleDetailId
     */
    public function setUserRoleDetailId($userRoleDetailId)
    {
        $this->userRoleDetailId = $userRoleDetailId;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getShortDesc()
    {
        return $this->shortDesc;
    }

    /**
     * @param string $shortDesc
     */
    public function setShortDesc($shortDesc)
    {
        $this->shortDesc = $shortDesc;
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