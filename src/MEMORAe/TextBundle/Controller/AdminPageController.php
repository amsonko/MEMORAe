<?php

namespace MEMORAe\TextBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Description of AdminPageController
 *
 * @author Amstrong
 */
class AdminPageController extends Controller{
    
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();
        $pages = $em->getRepository('MEMORAeTextBundle:PageEntity')->getAllPages();
        if (!$pages) {
            throw $this->createNotFoundException('Unable to find any page');
        }
        return $this->render('MEMORAeTextBundle:Admin:index.html.twig', array(
            'pages'      => $pages,
        ));
    }
        
    private function adminHomeForm($pageId){
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('MEMORAeTextBundle:MediaEntity')->findOneBy(array("page" => $pageId));
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find any media to edit');
        }
        $editForm = $this->get('media_service')->createEditForm($entity);
        return $this->render('MEMORAeTextBundle:Admin:home.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }
    
    private function adminWimForm($pageId){
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('MEMORAeTextBundle:SectionEntity')->findSectionsByPage($pageId);
        if (!$entities) {
            throw $this->createNotFoundException('Unable to find any media to edit');
        }
        return $this->render('MEMORAeTextBundle:Admin:whatIsMemorae.html.twig', array(
            'sections'      => $entities,
        ));
    }
    
}
