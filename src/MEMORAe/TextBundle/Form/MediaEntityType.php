<?php

namespace MEMORAe\TextBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class MediaEntityType extends AbstractType
{
    private $type;
    private $pageId;
    private $language;
    public function __construct($type, $pageId, $language = null){
        $this->type = $type;
        $this->pageId = $pageId;
        $this->language = $language;
    }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        if($this->type != "text"){
            $builder->add('name', 'text');
            
            
            if($this->type == "video"){
                $builder->add('path', 'text');
            }
            
            if($this->type == "file" || $this->type == "img"){
                $builder->add('file', 'file', array('required' => false));
            }
        }
        
        
        if($this->pageId != null && $this->pageId != 100 && $this->pageId >= 5){
            $builder->add('section', 'entity', array(
                'class' => 'MEMORAeTextBundle:SectionEntity',
                'property' => 'name',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('s')
                        ->where('s.page = :id and s.language = :language')
                        ->setParameter('id', $this->pageId)
                        ->setParameter('language', $this->language)
                        ->orderBy('s.id', 'ASC');
                },
            ));
        }
        if($this->type != "img"){
            $builder->add('content', 'ckeditor');
        }
               
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MEMORAe\TextBundle\Entity\MediaEntity',
            'class'=>'form-horizontal'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'memorae_textbundle_mediaentity';
    }
}
