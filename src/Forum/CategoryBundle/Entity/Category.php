<?php

namespace Forum\CategoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Forum\CategoryBundle\Entity\CategoryRepository")
 */
class Category
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
     * @ORM\OneToMany(targetEntity="Forum\TopicBundle\Entity\Topic", mappedBy="category")
     */

    private $topic;


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
     * @return Category
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
        $this->topic = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add topic
     *
     * @param \Forum\TopicBundle\Entity\Topic $topic
     * @return Category
     */

    public function addTopic(\Forum\TopicBundle\Entity\Topic $topic)
    {
        $this->topic[] = $topic;
    
        return $this;
    }

    /**
     * Remove topic
     *
     * @param \Forum\TopicBundle\Entity\Topic $topic
     */
    public function removeTopic(\Forum\TopicBundle\Entity\Topic $topic)
    {
        $this->topic->removeElement($topic);
    }

    /**
     * Get topic
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTopic()
    {
        return $this->topic;
    }

    public function __toString()
    {
        return $this->getName();
    }
}