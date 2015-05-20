<?php
// src/MEMORAe/TextBundle//Repository/AdvertRepository.php

namespace MEMORAe\TextBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PageEntityRepository extends EntityRepository
{
    /**
     * 
     * @return un array dans lequel on a toutes les pages avec soit les sections qui leurs sont associées soit les médias
     */
    public function getAllPages($language="fr"){
        $mediaRepository = $this->getEntityManager()->getRepository("MEMORAeTextBundle:MediaEntity");
        $sectionRepository = $this->getEntityManager()->getRepository("MEMORAeTextBundle:SectionEntity");
        
        $pages = array(
            "home" => array(
                "text" => $mediaRepository->findOneBy(array("page" => 1, "type" => "text", "language" => $language)),
                "video" => $mediaRepository->findOneBy(array("page" => 1, "type" => "video", "language" => $language))
            ),
            "wim" => $sectionRepository->findSectionsByPage(2, $language),
            "doc" => $mediaRepository->findBy(array("page" => 3, "language" => $language, "type" => "file")),
            "video" => $mediaRepository->findBy(array("page" => 4, "language" => $language, "type" => "video")),
            "projets" => $this->getPageById(5, $language),
            "theses" => $this->getPageById(6, $language),
            "publications" => $this->getPageById(7, $language));
        return $pages;
    }
    
    private function getPageById($pageId, $language="fr"){
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT p, s, m FROM MEMORAe\TextBundle\Entity\PageEntity p JOIN p.sections s JOIN s.medias m where p.id=?1 and (m.language=?2 or s.language=?2)")
                    ->setParameter(1, $pageId)
                    ->setParameter(2, $language);
        
        return $query->getOneOrNullResult();
    }
     
}