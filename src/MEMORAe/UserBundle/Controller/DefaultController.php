<?php

namespace MEMORAe\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MEMORAeUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
