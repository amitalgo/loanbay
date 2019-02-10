<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 05/11/2018
 * Time: 10:35 AM
 */

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Admin
 * @ORM\Entity
 * @ORM\Table(name="CMS")
 */
class CMS
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
    private $title;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    private $featureImg;

    /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    private $slug;

    /**
     * @var string
     * @ORM\Column(type="boolean",options={"default" : 1})
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getFeatureImg()
    {
        return $this->featureImg;
    }

    /**
     * @param string $featureImg
     */
    public function setFeatureImg($featureImg)
    {
        $this->featureImg = $featureImg;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
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