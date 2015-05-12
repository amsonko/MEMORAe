<?php

namespace MEMORAe\TextBundle\Entity;

/**
 * Description of MediaEntitiy: classe entity pour la table Media
 *
 * @author Amstrong
 */

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="MEMORAe\TextBundle\Repository\MediaEntityRepository")
 * @ORM\Table(name="Media")
 */

class MediaEntity {
    /**
     * @ORM\Id
     * @ORM\Column(name="media_id", type="bigint")
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="media_pk_seq")
     */
    private $id;   
    /**
     * @ORM\Column(name="media_name", type="string", length=255, nullable=true)
     */
    private $name;
    
    /**
     * @ORM\Column(name="media_path", type="text", nullable=true)
     */
    private $path;
    
    /**
     * @ORM\Column(name="media_content", type="text", nullable=true)
     */
    private $content;
    
    /**
     * @ORM\Column(name="media_type", type="string", nullable=true)
     */
    private $type;
    
    /**
     * @ORM\Column(name="media_language", type="string")
     */
    private $language;
    
    /**
     * @ORM\ManyToOne(targetEntity="PageEntity", inversedBy="medias")
     * @ORM\JoinColumn(name="page_id", referencedColumnName="page_id", nullable=false)
     **/
    private $page;

    /**
     * @ORM\ManyToOne(targetEntity="SectionEntity", inversedBy="medias")
     * @ORM\JoinColumn(name="section_id", referencedColumnName="section_id", nullable=true)
     **/
    private $section;
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
     * @return MediaEntitiy
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
     * Set path
     *
     * @param string $path
     * @return MediaEntitiy
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return MediaEntitiy
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return MediaEntitiy
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return MediaEntitiy
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
     * @return MediaEntitiy
     */
    public function setPage(\MEMORAe\TextBundle\Entity\PageEntity $page = null)
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

    /**
     * Set section
     *
     * @param \MEMORAe\TextBundle\Entity\SectionEntity $section
     * @return MediaEntity
     */
    public function setSection(\MEMORAe\TextBundle\Entity\SectionEntity $section = null)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get section
     *
     * @return \MEMORAe\TextBundle\Entity\SectionEntity 
     */
    public function getSection()
    {
        return $this->section;
    }
}
