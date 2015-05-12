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
     
        $media =$repository->findBy(array("page" => $pageId));
        
          
        if (!$media) {
            throw $this->createNotFoundException('Unable to find any text for page with the id '.$pageId);
        }
        switch($pageId)
        {
            case 1:
                $media =$repository->findBy(array("page" => $pageId, "type"=>"text"));
                $video =$repository->findOneBy(array("page" => $pageId, "type"=>"video"));
                
                if (!$video) {
                    throw $this->createNotFoundException('Unable to find any video for page with the id '.$pageId);
                }
                return $this->render("MEMORAeTextBundle:Page:home.html.twig", array('medias' =>$media, 'video'=>$video));
                
            case 2:
                return $this->render("MEMORAeTextBundle:Page:whatIsMemorae.html.twig", array('wim' =>$media));
            case 3:
                return $this->render("MEMORAeTextBundle:Page:document.html.twig", array('doc' =>$media));
            case 4:
                return $this->render("MEMORAeTextBundle:Page:video.html.twig", array('video' =>$media));
            case 5:
                return $this->render("MEMORAeTextBundle:Page:randd.html.twig", array('randd' =>$media));
        }
                
    }
}
