<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 *
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="cpiui")
 */
class Cpiui
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
    private $title;
    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Cpiui",fetch="EAGER",mappedBy="parent")
     */
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="Cpt",fetch="EAGER", inversedBy="cpt")
     * @ORM\JoinColumn(name="cpt_id", referencedColumnName="id")
     */
    private $cptid;

    /**
     * @ORM\ManyToOne(targetEntity="Cpiui",inversedBy="children")
     * @ORM\JoinColumn(name="parent", referencedColumnName="id")
     */
    protected $parent;

    /**
     * @ORM\Column(type="text")
     */
    private $attribute;

    /**
     * @ORM\Column(type="string",length=200)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity="CptuiQuestionariesLink",fetch="EAGER", mappedBy="cptui",cascade={"persist"})
     */
    private $cptuiQuestion;

    /**
     * @ORM\OneToMany(targetEntity="CptuiDocumentLink",fetch="EAGER", mappedBy="cptui",cascade={"persist"})
     */
    private $cptuiDocument;

    /**
     * @ORM\OneToMany(targetEntity="CptuiQuestionariesAnswers",fetch="EAGER", mappedBy="cptui",cascade={"persist"})
     */
    private $cptuiQuestionAnswer;

    /**
     * @ORM\OneToMany(targetEntity="CptuiDocumentAnswers",fetch="EAGER", mappedBy="cptui",cascade={"persist"})
     */
    private $cptuiDocumentAnswer;

    public function getParent() {
        return $this->parent;
    }

    public function getChildren() {
        return $this->children;
    }

    public function __construct()
    {
        $this->cptuiQuestion=new ArrayCollection();
        $this->cptuiDocument= new ArrayCollection();
        $this->children = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getCptid()
    {
        return $this->cptid;
    }

    /**
     * @param mixed $cptid
     */
    public function setCptid($cptid)
    {
        $this->cptid = $cptid;
    }

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
     * @ORM\Column(type="string",length=500, nullable=true)
     */
    private $featuredimage;

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
    public function getFeaturedimg()
    {
        return $this->featuredimage;
    }

    /**
     * @param mixed $featuredimg
     */
    public function setFeaturedimg($featuredimg)
    {
        $this->featuredimage = $featuredimg;
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

    // always use this to setup a new parent/child relationship
    public function addChild(Cpiui $child) {
        $this->children[] = $child;
        $child->setParent($this);
    }

    public function setParent(Cpiui $parent) {
        $this->parent = $parent;
    }

    /**
     * @return mixed
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * @param mixed $attribute
     */
    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getFeaturedimage()
    {
        return $this->featuredimage;
    }

    /**
     * @param mixed $featuredimage
     */
    public function setFeaturedimage($featuredimage)
    {
        $this->featuredimage = $featuredimage;
    }

    /**
     * @return mixed
     */
    public function getCptuiQuestion()
    {
        return $this->cptuiQuestion;
    }

    /**
     * @param mixed $cptuiQuestion
     */
    public function setCptuiQuestion($cptuiQuestion)
    {
        $this->cptuiQuestion = $cptuiQuestion;
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

    public function addQuestionariesLink(CptuiQuestionariesLink $cptuiQuestionariesLink)
    {
        if(!$this->cptuiQuestion->contains($cptuiQuestionariesLink)){
            $cptuiQuestionariesLink->setCptui($this);
            $this->cptuiQuestion->add($cptuiQuestionariesLink);
        }
    }

    public function addDocumentLink(CptuiDocumentLink $cptuiDocumentLink)
    {
        if(!$this->cptuiDocument->contains($cptuiDocumentLink)){
            $cptuiDocumentLink->setCptui($this);
            $this->cptuiDocument->add($cptuiDocumentLink);
        }
    }

}