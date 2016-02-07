<?php

namespace Dawpal\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 */
class Post
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $pole;

    /**
     * @var integer
     */
    private $test;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set pole
     *
     * @param string $pole
     * @return Post
     */
    public function setPole($pole)
    {
        $this->pole = $pole;
    
        return $this;
    }

    /**
     * Get pole
     *
     * @return string 
     */
    public function getPole()
    {
        return $this->pole;
    }

    /**
     * Set test
     *
     * @param integer $test
     * @return Post
     */
    public function setTest($test)
    {
        $this->test = $test;
    
        return $this;
    }

    /**
     * Get test
     *
     * @return integer 
     */
    public function getTest()
    {
        return $this->test;
    }
}
