<?php

// src/MEMORAe/TextBundle/Controller/PageController.php

namespace MEMORAe\TextBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction($id=1)
    {
        return $this->buildPage($id);
    }
    
    
    public function buildPage($pageId) {
        
        $em = $this->getDoctrine()->getEntityManager();
        
        $text = $em->getRepository('MEMORAeTextBundle:MediaEntity')->findOneBy(array('page' => $pageId,'type' => 'text'));

        if (!$text) {
            throw $this->createNotFoundException('Unable to find any text for page with the id '.$pageId);
        }
        
        return $this->render('MEMORAeTextBundle:Page:index.html.twig', array('text' =>$text));
    }
}