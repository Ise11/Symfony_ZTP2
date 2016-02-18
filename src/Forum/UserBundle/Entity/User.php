<?php

namespace Forum\UserBundle\Entity;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 */
class User extends BaseUser
{
    /**
     * @var integer
     */
    protected $id;

    /**
     *
     */
    protected $username;
    /**
     * @ORM\OneToMany(targetEntity="Forum\PostBundle\Entity\Post", mappedBy="userId")
     */
    protected $post;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
