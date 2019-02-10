<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 24/01/2019
 * Time: 11:29 AM
 */

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 *
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="cptui_questionaries_link")
 */
class CptuiQuestionariesLink
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Cpiui", inversedBy="cptuiQuestion")
     * @ORM\JoinColumn(name="cptui_id", referencedColumnName="id")
     */
    private $cptui;

    /**
     * @ORM\ManyToOne(targetEntity="Questionaries", inversedBy="cptQuestionaries")
     * @ORM\JoinColumn(name="questionaries_id", referencedColumnName="id")
     */
    private $questionaries;

    /**
     * @ORM\Column(type="text")
     */
    private $type;

    /**
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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCptui()
    {
        return $this->cptui;
    }

    /**
     * @param mixed $cptui
     */
    public function setCptui($cptui)
    {
        $this->cptui = $cptui;
    }

    /**
     * @return mixed
     */
    public function getQuestionaries()
    {
        return $this->questionaries;
    }

    /**
     * @param mixed $questionaries
     */
    public function setQuestionaries($questionaries)
    {
        $this->questionaries = $questionaries;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getisActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
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