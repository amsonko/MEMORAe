<?php

namespace MEMORAe\TextBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SectionEntityType extends AbstractType
{
    
    private $type;
    private $page;
    
    public function __construct($type, $page) {
        $this->type = $type;
        $this->page = $page;
    }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
            $builder->add('name', 'text')
                    ->add('medias', 'collection', array('type' => new MediaEntityType($this->type, $this->page)));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MEMORAe\TextBundle\Entity\SectionEntity',
            'class'=>'form-horizontal'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'memorae_textbundle_sectionentity';
    }
}
