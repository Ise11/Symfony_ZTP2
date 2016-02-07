<?php

namespace Forum\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ForumUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
