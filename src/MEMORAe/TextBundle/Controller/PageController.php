<?php

 // src/MEMORAe/TextBundle/Controller/PageController.php

namespace MEMORAe\TextBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageController extends Controller
{
    public function indexAction($id)
    {
        
        if (!isset($id)||$id==0){
            $id=1;
        }    
       
        return $this->buildPage($id);
    }
    
    
    public function buildPage($pageId) {
       
        if (!$pageId || $pageId >10){
      //       throw new NotFoundHttpException("Page .$pageId. inexistante.");
        }
        
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('MEMORAeTextBundle:MediaEntity');
     
        $media =$repository->findMedia($pageId);
        
          
        if (!$media) {
            throw $this->createNotFoundException('Unable to find any text for page with the id '.$pageId);
        }
        
        return $this->render($media["view"], 
                array('medias' =>$media["media"]));
    }
}