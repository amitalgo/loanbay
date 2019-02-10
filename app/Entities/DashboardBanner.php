<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 23/11/2018
 * Time: 10:09 AM
 */

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Admin
 * @ORM\Entity
 * @ORM\Table(name="dashboard_banner")
 */
class DashboardBanner
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
     * @ORM\Column(type="string", length=150)
     */
    private $shortDesc;

    /**
     * @var string
     * @ORM\Column(type="string", length=150,nullable=true)
     */
    private $image;

    /**
     * @var string
     * @ORM\Column(type="string", length=150,nullable=true)
     */
    private $buttonName;

    /**
     * @var string
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $buttonLink;

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
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getButtonName()
    {
        return $this->buttonName;
    }

    /**
     * @param string $buttonName
     */
    public function setButtonName($buttonName)
    {
        $this->buttonName = $buttonName;
    }

    /**
     * @return string
     */
    public function getButtonLink()
    {
        return $this->buttonLink;
    }

    /**
     * @param string $buttonLink
     */
    public function setButtonLink($buttonLink)
    {
        $this->buttonLink = $buttonLink;
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