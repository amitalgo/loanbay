<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 23/01/2019
 * Time: 1:58 PM
 */

namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;

/**
 *
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="document_type")
 */
class DocumentType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $type;
    /**
     * @ORM\Column(type="text")
     */
    private $isMandatory;

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
     * @ORM\OneToMany(targetEntity="CptuiDocumentLink",fetch="EAGER", mappedBy="document",cascade={"persist"})
     */
    private $cptuiDocument;

    /**
     * @ORM\OneToMany(targetEntity="CptuiDocumentAnswers",fetch="EAGER", mappedBy="documents",cascade={"persist"})
     */
    private $cptuiDocumentAnswer;

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

    /**
     * @return mixed
     */
    public function getisMandatory()
    {
        return $this->isMandatory;
    }

    /**
     * @param mixed $isMandatory
     */
    public function setIsMandatory($isMandatory)
    {
        $this->isMandatory = $isMandatory;
    }

    /**
     * @return mixed
     */
    public function getCptuiDocument()
    {
        return $this->cptuiDocument;
    }

    /**
     * @param mixed $cptuiDocument
     */
    public function setCptuiDocument($cptuiDocument)
    {
        $this->cptuiDocument = $cptuiDocument;
    }

    /**
     * @return mixed
     */
    public function getCptuiDocumentAnswer()
    {
        return $this->cptuiDocumentAnswer;
    }

    /**
     * @param mixed $cptuiDocumentAnswer
     */
    public function setCptuiDocumentAnswer($cptuiDocumentAnswer)
    {
        $this->cptuiDocumentAnswer = $cptuiDocumentAnswer;
    }

}