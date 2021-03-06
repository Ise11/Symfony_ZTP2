<?php

namespace Forum\TopicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Topic
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Topic
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;



    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Forum\CategoryBundle\Entity\Category", inversedBy="topic")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="Forum\PostBundle\Entity\Post", mappedBy="topic", cascade={"persist"})
     */
    // cascade
    private $post;


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
     * Set name
     *
     * @param string $name
     * @return Topic
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
//        $this->post = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set category
     *
     * @param \Forum\CategoryBundle\Entity\Category $category
     * @return Topic
     */
    public function setCategory(\Forum\CategoryBundle\Entity\Category $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \Forum\CategoryBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add post
     *
     * @param \Forum\PostBundle\Entity\Post $post
     * @return Topic
     */
    public function setPost(\Forum\PostBundle\Entity\Post $post)
    {
        $this->post[] = $post;
    
        return $this;
    }

    /**
     * Remove post
     *
     * @param \Forum\PostBundle\Entity\Post $post
     */
    public function removePost(\Forum\PostBundle\Entity\Post $post)
    {
        $this->post->removeElement($post);
    }

    /**
     * Get post
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPost()
    {
        return $this->post;
    }

    public function __toString()
    {
        return $this->getName();
    }
}