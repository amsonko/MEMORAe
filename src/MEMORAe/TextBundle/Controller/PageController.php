<?php

 // src/MEMORAe/TextBundle/Controller/PageController.php

namespace MEMORAe\TextBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use MEMORAe\TextBundle\Form\AdminHome;

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
       
        
        $mediaRepository = $this->getDoctrine()->getEntityManager()->getRepository('MEMORAeTextBundle:MediaEntity');
        $sectionRepository = $this->getDoctrine()->getEntityManager()->getRepository('MEMORAeTextBundle:SectionEntity');
     
        $media =$mediaRepository->findBy(array("page" => $pageId));
        
          
//        if (!$media) {
//            throw $this->createNotFoundException('Unable to find any text for page with the id '.$pageId);
//        }
        switch($pageId)
        {
            case 1:
                $text =$mediaRepository->findBy(array("page" => $pageId, "type"=>"text"));
                
                if (!$text) {
                    throw $this->createNotFoundException('Unable to find any text for homepage ');
                }
                $video =$mediaRepository->findOneBy(array("page" => $pageId, "type"=>"video"));
                
                if (!$video) {
                    throw $this->createNotFoundException('Unable to find any video for page with the id '.$pageId);
                }
                return $this->render("MEMORAeTextBundle:Page:home.html.twig", array('text' =>$text, 'video'=>$video));
                
            case 2:
                $sections = $sectionRepository->findBy(array("page" => $pageId));
                
                if (!$sections) {
                    throw $this->createNotFoundException('Unable to find any section for the page what is memorae');
                }
                
                return $this->render("MEMORAeTextBundle:Page:whatIsMemorae.html.twig", array('sections' =>$sections));
            
                case 3:
                return $this->render("MEMORAeTextBundle:Page:document.html.twig", array('doc' =>$media));
            case 4:
                return $this->render("MEMORAeTextBundle:Page:video.html.twig", array('video' =>$media));
            case 5:
                $sections = $sectionRepository->findBy(array("page" => $pageId));
                
                if (!$sections) {
                    throw $this->createNotFoundException('Unable to find any section for the page what is memorae');
                }
                return $this->render("MEMORAeTextBundle:Page:recherche.html.twig", array('recherche' =>$sections));
             case 6:
                 $sections = $sectionRepository->findBy(array("page" => $pageId));
                
                if (!$sections) {
                    throw $this->createNotFoundException('Unable to find any section for the page what is memorae');
                }
                return $this->render("MEMORAeTextBundle:Page:these.html.twig", array('theses' =>$sections));
            case 8:
                $text =$mediaRepository->findOneBy(array("page" => 1, "type"=>"text"));
                $this->cakeRequest['id']=$text->getId();
                echo" id avant submit".$this->cakeRequest['id'];
                $form = $this->createForm(new AdminHome(), $text);
                
                return $this->render("MEMORAeTextBundle:Page:adminHome.html.twig", array("text" => $form->createView()));
        }
                
    }
}
