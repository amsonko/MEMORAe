<?php
// src/MEMORAe/TextBundle//Repository/MediaEntityRepository.php

namespace MEMORAe\TextBundle\Repository;

use Doctrine\ORM\EntityRepository;

class MediaEntityRepository extends EntityRepository
{
    
    public function findAllMedia(){
    
    $qMemorae=$this->findMediaForOnePage(2);
    $home=$this->findMediaForOnePage(1);
    return array("home" => $home,
                 "qMemorae" => $qMemorae
                );
  
}
    public function findMediaForOnePage($id){
        
         $qb = $this->createQueryBuilder('a');

  $qb->where('a.page = :id')
    ->setParameter('id', $id);

    return $qb
    ->getQuery()
    ->getResult() ;
    }
    public function findMedia($pageId){
        $media=array();
        switch($pageId){
            
           case 1:
               $media["media"]=$this->findBy(array("page"=>$pageId));
               $media["view"]="MEMORAeTextBundle:Page:home.html.twig";
            break;
           case 2:
               
            break;
        case 3:
               $media["media"]=$this->findBy(array("page"=>$pageId));
               $media["view"]="MEMORAeTextBundle:Page:document.html.twig";
            break;
        case 4:
               $media["media"]=$this->findBy(array("page"=>$pageId));
               $media["view"]="MEMORAeTextBundle:Page:video.html.twig";
            break;
        case 5:
               
        break;
         case 6:
               
            break;
        
        }
    
    return $media;
                
  
}
    
}
