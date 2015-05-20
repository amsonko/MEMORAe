<?php
namespace MEMORAe\TextBundle\Entity;
/**
 * Classe entity des pages
 *
 * @author Amstrong
 */

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="MEMORAe\TextBundle\Repository\PageEntityRepository")
 * @ORM\Table(name="Page")
 */

class PageEntity {
    
    /**
     * @ORM\Id
     * @ORM\Column(name="page_id", type="bigint")
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="page_pk_seq")
     */
    private $id;
    
    /**
     * @ORM\Column(name="page_name", type="string", length=255)
     */
    private $name;
    
    /**
     * @ORM\OneToMany(targetEntity="MediaEntity", mappedBy="page")
     */
    private $medias;
    
    /**
     * @ORM\OneToMany(targetEntity="SectionEntity", mappedBy="page")
     */
    private $sections;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->medias = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return PageEntity
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add medias
     *
     * @param \MEMORAe\TextBundle\Entity\MediaEntity $medias
     * @return PageEntity
     */
    public function addMedia(\MEMORAe\TextBundle\Entity\MediaEntity $medias)
    {
        $this->medias[] = $medias;

        return $this;
    }

    /**
     * Remove medias
     *
     * @param \MEMORAe\TextBundle\Entity\MediaEntity $medias
     */
    public function removeMedia(\MEMORAe\TextBundle\Entity\MediaEntity $medias)
    {
        $this->medias->removeElement($medias);
    }

    /**
     * Get medias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMedias()
    {
        return $this->medias;
    }

    /**
     * Add sections
     *
     * @param \MEMORAe\TextBundle\Entity\SectionEntity $sections
     * @return PageEntity
     */
    public function addSection(\MEMORAe\TextBundle\Entity\SectionEntity $sections)
    {
        $this->sections[] = $sections;

        return $this;
    }

    /**
     * Remove sections
     *
     * @param \MEMORAe\TextBundle\Entity\SectionEntity $sections
     */
    public function removeSection(\MEMORAe\TextBundle\Entity\SectionEntity $sections)
    {
        $this->sections->removeElement($sections);
    }

    /**
     * Get sections
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSections()
    {
        return $this->sections;
    }
}
