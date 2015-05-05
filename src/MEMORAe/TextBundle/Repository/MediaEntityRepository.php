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
    
}
