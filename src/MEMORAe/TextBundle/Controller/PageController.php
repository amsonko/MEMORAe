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
                return $this->render("MEMORAeTextBundle:Page:home.html.twig", array('text' =>$text, 'video'=>$video));
                
            case 2:
                $sections = $sectionRepository->findSectionsByPage($pageId, $language, "video");
                
                if (!$sections) {
                    throw $this->createNotFoundException('Unable to find any section for the page what is memorae');
                }
                
                return $this->render("MEMORAeTextBundle:Page:whatIsMemorae.html.twig", array('sections' =>$sections));
            
            case 3:
                $media = $mediaRepository->findBy(array("page" => $pageId, "type" => "file", "language" => $language));
                
                if (!$media) {
                    throw $this->createNotFoundException('Unable to find any files for documents page in '.$language);
                }
                return $this->render("MEMORAeTextBundle:Page:document.html.twig", array('doc' =>$media));
            case 4:
                $media = $mediaRepository->findBy(array("page" => $pageId, "type" => "video", "language" => $language));
                
                if (!$media) {
                    throw $this->createNotFoundException('Unable to find any videos for videos page in '.$language);
                }
                return $this->render("MEMORAeTextBundle:Page:video.html.twig", array('video' =>$media));
            case 5:
                $sections = $sectionRepository->findSectionsByPage($pageId, $language);
                
                if (!$sections) {
                    throw $this->createNotFoundException('Unable to find any section for the research page in '.$language);
                }
                return $this->render("MEMORAeTextBundle:Page:recherche.html.twig", array('recherche' =>$sections));
             case 6:
                 $sections = $sectionRepository->findSectionsByPage($pageId, $language);
                
                if (!$sections) {
                    throw $this->createNotFoundException('Unable to find any section for the thesis page in '.$language);
                }
                return $this->render("MEMORAeTextBundle:Page:these.html.twig", array('theses' =>$sections));
            case 7:
                 $sections = $sectionRepository->findBy(array("page" => $pageId));
               // echo "taille  pour cette section ".count($sections);
                if (!$sections) {
                    throw $this->createNotFoundException('Unable to find any section for the page what is memorae');
                }
                return $this->render("MEMORAeTextBundle:Page:recherche.html.twig", array('recherche' =>$sections,'publication'=>true));
        }
                
    }
}
