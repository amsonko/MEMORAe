<?php

namespace MEMORAe\UserBundle\Entity;

/**
 * Classe entity pour les admins
 *
 * @author Amstrong
 */
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="Admin")
 */

class AdminEntity extends BaseUser{
    /**
     * @ORM\Id
     S* @ORM\Column(name="admin_id", type="bigint")
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="admin_pk_seq")
     */
    protected $id;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
