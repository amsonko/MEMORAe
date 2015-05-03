<?php
// src/MEMORAe/TextBundle//Repository/MediaEntityRepository.php

namespace MEMORAe\TextBundle\Repository;

use Doctrine\ORM\EntityRepository;

class MediaEntityRepository extends EntityRepository
{
    
    public function findAllMedia(){
    $home=findMediaForOnePage(1);
    $qMemorae=findMediaForOnePage(2);
    return array("home" => $home,
                 "qMemerae" => $qMemorae
                );
  
}
    private function findMediaForOnePage($id){
        
         $qb = $this->createQueryBuilder('a');

  $qb->where('a.id = :id')
    ->setParameter('id', $id);

    return $qb
    ->getQuery()
    ->getResult() ;
    }
    
}
