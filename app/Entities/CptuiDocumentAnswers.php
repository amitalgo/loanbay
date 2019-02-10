<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 28/01/2019
 * Time: 5:42 PM
 */

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 *
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="cptui_document_answer")
 */
class CptuiDocumentAnswers
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Cpiui", inversedBy="cptuiDocumentAnswer")
     * @ORM\JoinColumn(name="cptui_id", referencedColumnName="id")
     */
    private $cptui;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="cptuiQuestionAnswer")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $userId;

    /**
     * @ORM\ManyToOne(targetEntity="DocumentType", inversedBy="cptuiDocumentAnswer")
     * @ORM\JoinColumn(name="document_id", referencedColumnName="id")
     */
    private $documents;

    /**
     * @ORM\Column(type="text")
     */
    private $documentUrl;

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
     * @return mixed
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * @param mixed $documents
     */
    public function setDocuments($documents)
    {
        $this->documents = $documents;
    }

    /**
     * @return mixed
     */
    public function getDocumentUrl()
    {
        return $this->documentUrl;
    }

    /**
     * @param mixed $documentUrl
     */
    public function setDocumentUrl($documentUrl)
    {
        $this->documentUrl = $documentUrl;
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