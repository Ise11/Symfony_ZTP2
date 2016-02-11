<?php

namespace Forum\TopicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ForumTopicBundle:Default:index.html.twig', array('name' => $name));
    }
}
