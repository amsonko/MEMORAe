<?php
// src/MEMORAe/TextBundle//Repository/MediaEntityRepository.php

namespace MEMORAe\TextBundle\Repository;

use Doctrine\ORM\EntityRepository;

class MediaEntityRepository extends EntityRepository
{
    
    public function findMediaCurrentpage($id){
     $qb = $this->createQueryBuilder('a');

  $qb->where('a.id = :id')
    ->setParameter('id', $id);

  return $qb
    ->getQuery()
    ->getResult() ;
  
}
    
}
