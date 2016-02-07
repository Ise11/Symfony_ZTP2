<?php

namespace Dawpal\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DawpalTestBundle:Default:index.html.twig', array('name' => $name));
    }
}
