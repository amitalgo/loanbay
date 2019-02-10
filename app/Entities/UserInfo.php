<?php
/**
 * Created by PhpStorm.
 * User: TechnopleSolutions
 * Date: 22/11/18
 * Time: 2:33 PM
 */

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use PhpParser\Node\Scalar\String_;

/**
 * Class UserInfo
 * @package App\Entities
 * @ORM\Entity
 * @ORM\Table(name="user_info")
 */
class UserInfo
{

    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="UserAttribute")
     * @ORM\JoinColumn(name="key_id", referencedColumnName="id")
     */
    private $key;

    /**
     * @var String
     * @ORM\Column(name="value")
     */
    private $value;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     */
    public function setKey($key): void
    {
        $this->key = $key;
    }

    /**
     * @return String
     */
    public function getValue(): String
    {
        return $this->value;
    }

    /**
     * @param String $value
     */
    public function setValue(String $value): void
    {
        $this->value = $value;
    }


}