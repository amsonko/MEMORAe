<?php

namespace MEMORAe\TextBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Description of SectionEnityRepository
 *
 * @author Amstrong
 */
class SectionEntityRepository extends EntityRepository{
    /**
     * Permet de trouver toutes les sections d'une page avec leur contenu
     * @param type $pageId id de la page
     */
    public function findSectionsByPage($pageId, $language, $type = "file"){
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT s, m FROM MEMORAe\TextBundle\Entity\SectionEntity s LEFT JOIN s.medias m WHERE s.page = ?1 and s.language=?2 and m.type=?3")
                ->setParameter(1, $pageId)
                ->setParameter(2, $language)
                ->setParameter(3, $type);
        return $query->getResult();
    }
    
    public function getSectionNamesByPage($pageId, $language="fr"){
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT s.name FROM MEMORAe\TextBundle\Entity\SectionEntity s WHERE s.page = ?1 and s.language=?2")
                ->setParameter(1, $pageId)
                ->setParameter(2, $language);
        return $query->getResult();
    }
}
