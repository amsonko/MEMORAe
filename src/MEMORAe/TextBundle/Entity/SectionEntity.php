<?php

/**
 * Classe entity des sections de pages
 *
 * @author Amstrong
 */
namespace MEMORAe\TextBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="MEMORAe\TextBundle\Repository\SectionEntityRepository")
 * @ORM\Table(name="Section")
 */

class SectionEntity {
    /**
     * @ORM\Id
     * @ORM\Column(name="section_id", type="bigint")
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="section_pk_seq")
     */
    private $id;
    
    /**
     * @ORM\Column(name="section_name", type="string", length=255)
     */
    private $name;
    
    /**
     * @ORM\OneToMany(targetEntity="MediaEntity", mappedBy="section")
     */
    private $medias;
    
    /**
     * @ORM\Column(name="section_language", type="string")
     */
    private $language;
    
    /**
     * @ORM\ManyToOne(targetEntity="PageEntity", inversedBy="sections")
     * @ORM\JoinColumn(name="page_id", referencedColumnName="page_id", nullable=false)
     **/
    private $page;
    
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
     * @return SectionEntity
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
     * @return SectionEntity
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
     * Set language
     *
     * @param string $language
     * @return SectionEntity
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set page
     *
     * @param \MEMORAe\TextBundle\Entity\PageEntity $page
     * @return SectionEntity
     */
    public function setPage(\MEMORAe\TextBundle\Entity\PageEntity $page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \MEMORAe\TextBundle\Entity\PageEntity 
     */
    public function getPage()
    {
        return $this->page;
    }
    
}
