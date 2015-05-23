<?php

namespace MEMORAe\TextBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
/**
 * Conttroller permettant de gérer l'écran d'accueil admin
 *
 * @author Amstrong
 */
class AdminPageController extends Controller{
    
    public function indexAction(Request $request){
        $language = $request->getLocale();
        if($language != 'en' && $language != 'fr'){
            $language = 'en';
        }
        $em = $this->getDoctrine()->getManager();
        $pages = $em->getRepository('MEMORAeTextBundle:PageEntity')->getAllPages($language);
        if (!$pages) {
            throw $this->createNotFoundException('Unable to find any page in '.$language);
        }
        return $this->render('MEMORAeTextBundle:Admin:index.html.twig', array(
            'pages'      => $pages,
        ));
    }
        
}
