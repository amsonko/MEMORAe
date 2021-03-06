<?php

 // src/MEMORAe/TextBundle/Controller/PageController.php

namespace MEMORAe\TextBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use MEMORAe\TextBundle\Form\AdminHome;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    public function indexAction(Request $request, $id)
    {
        $language = $request->getLocale();
        if($language != 'en' && $language != 'fr'){
            $language = 'en';
        }
        if (!isset($id)||$id==0){
            $id=1;
        }    
       
        return $this->buildPage($id, $language);
    }
    
    
    public function buildPage($pageId, $language) {
       
        
        $mediaRepository = $this->getDoctrine()->getEntityManager()->getRepository('MEMORAeTextBundle:MediaEntity');
        $sectionRepository = $this->getDoctrine()->getEntityManager()->getRepository('MEMORAeTextBundle:SectionEntity');
        
        //Cherchons les images du carousel
        
        $carousel = $mediaRepository->findBy(array("page" => 100, "type" => "img"));
        switch($pageId)
        {
            case 1:
           
                $text =$mediaRepository->findOneBy(array("page" => $pageId, "type"=>"text", "language" => $language));
                
                if (!$text) {
                    throw $this->createNotFoundException('Unable to find any text for homepage in '.$language);
                }
                $video =$mediaRepository->findOneBy(array("page" => $pageId, "type"=>"video", "language"=>$language));
                
                if (!$video) {
                    throw $this->createNotFoundException('Unable to find any video for homepage in '.$language);
                }
                return $this->render("MEMORAeTextBundle:Page:home.html.twig", array('text' =>$text, 'video'=>$video, 'carousel' => $carousel, 'page' => $pageId));
                
            case 2:
                $sections = $sectionRepository->findSectionsByPage($pageId, $language, "video");
                
                if (!$sections) {
                    throw $this->createNotFoundException('Unable to find any section for the page what is memorae');
                }
                
                return $this->render("MEMORAeTextBundle:Page:whatIsMemorae.html.twig", array('sections' =>$sections, 'carousel' => $carousel, 'page' => $pageId));
            
            case 3:
                $media = $mediaRepository->findBy(array("page" => $pageId, "type" => "file", "language" => $language));
                
                if (!$media) {
                    throw $this->createNotFoundException('Unable to find any files for documents page in '.$language);
                }
                return $this->render("MEMORAeTextBundle:Page:document.html.twig", array('doc' =>$media, 'carousel' => $carousel, 'page' => $pageId));
            case 4:
                $media = $mediaRepository->findBy(array("page" => $pageId, "type" => "video", "language" => $language));
                
                if (!$media) {
                    throw $this->createNotFoundException('Unable to find any videos for videos page in '.$language);
                }
                return $this->render("MEMORAeTextBundle:Page:video.html.twig", array('video' =>$media, 'carousel' => $carousel, 'page' => $pageId));
            case 5:
                $sections = $sectionRepository->findSectionsByPage($pageId, $language);
                
                if (!$sections) {
                    throw $this->createNotFoundException('Unable to find any section for the research page in '.$language);
                }
                return $this->render("MEMORAeTextBundle:Page:recherche.html.twig", array('recherche' =>$sections, 'carousel' => $carousel, 'page' => $pageId));
             case 6:
                 $sections = $sectionRepository->findSectionsByPage($pageId, $language);
                
                if (!$sections) {
                    throw $this->createNotFoundException('Unable to find any section for the thesis page in '.$language);
                }
                return $this->render("MEMORAeTextBundle:Page:these.html.twig", array('theses' =>$sections, 'carousel' => $carousel, 'page' => $pageId));
            case 7:
                 $sections = $sectionRepository->findBy(array("page" => $pageId));
                if (!$sections) {
                    throw $this->createNotFoundException('Unable to find any section for the page what is memorae');
                }
                return $this->render("MEMORAeTextBundle:Page:recherche.html.twig", array('recherche' =>$sections,'publication'=>true, 'carousel' => $carousel, 'page' => $pageId));
            default : 
                throw $this->createNotFoundException('Unable too reach the page with the id '.$pageId);
        }
              
    }
}
