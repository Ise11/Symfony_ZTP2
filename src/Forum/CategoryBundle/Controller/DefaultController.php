<?php

namespace Forum\CategoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ForumCategoryBundle:Default:index.html.twig', array('name' => $name));
    }
}
