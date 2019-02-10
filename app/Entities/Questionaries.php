<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 21/01/2019
 * Time: 5:46 PM
 */

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 *
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="questionaries")
 */
class Questionaries
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
    private $questionText;

    /**
     * @ORM\Column(type="text",nullable=true)
     */
    private $shortText;

    /**
     * @ORM\Column(type="text")
     */
    private $type;

    /**
     * @ORM\Column(type="text",nullable=true)
     */
    private $options;

    /**
     * @ORM\Column(type="text")
     */
    private $isMandatory;

    /**
     * @ORM\Column(type="text",nullable=true)
     */
    private $sequence;

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
     * @ORM\ManyToOne(targetEntity="Questionaries", inversedBy="children")
     * @ORM\JoinColumn(name="parent", referencedColumnName="id")
     */
    protected $parent;

    /**
     * @ORM\OneToMany(targetEntity="Questionaries", mappedBy="parent")
     */
    private $children;

    /**
     * @ORM\OneToMany(targetEntity="CptuiQuestionariesLink",fetch="EAGER", mappedBy="questionaries",cascade={"persist"})
     */
    private $cptQuestionaries;

    /**
     * @ORM\OneToMany(targetEntity="CptuiQuestionariesAnswers",fetch="EAGER", mappedBy="questionaries",cascade={"persist"})
     */
    private $cptuiQuestionariesAnswer;

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
    public function getQuestionText()
    {
        return $this->questionText;
    }

    /**
     * @param mixed $questionText
     */
    public function setQuestionText($questionText)
    {
        $this->questionText = $questionText;
    }

    /**
     * @return mixed
     */
    public function getShortText()
    {
        return $this->shortText;
    }

    /**
     * @param mixed $shortText
     */
    public function setShortText($shortText)
    {
        $this->shortText = $shortText;
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
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param mixed $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * @return mixed
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * @param mixed $sequence
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;
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
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return mixed
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param mixed $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
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
    public function getCptQuestionaries()
    {
        return $this->cptQuestionaries;
    }

    /**
     * @param mixed $cptQuestionaries
     */
    public function setCptQuestionaries($cptQuestionaries)
    {
        $this->cptQuestionaries = $cptQuestionaries;
    }

    /**
     * @return mixed
     */
    public function getCptQuestionariesAnswer()
    {
        return $this->cptQuestionariesAnswer;
    }

    /**
     * @param mixed $cptQuestionariesAnswer
     */
    public function setCptQuestionariesAnswer($cptQuestionariesAnswer)
    {
        $this->cptQuestionariesAnswer = $cptQuestionariesAnswer;
    }

    /**
     * @return mixed
     */
    public function getCptuiQuestionariesAnswer()
    {
        return $this->cptuiQuestionariesAnswer;
    }

    /**
     * @param mixed $cptuiQuestionariesAnswer
     */
    public function setCptuiQuestionariesAnswer($cptuiQuestionariesAnswer)
    {
        $this->cptuiQuestionariesAnswer = $cptuiQuestionariesAnswer;
    }
}