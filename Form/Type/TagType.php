<?php

namespace AIOMedia\MediaBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TagType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text');
    }

    public function getName()
    {
        return 'tag';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    	$resolver->setDefaults($this->getDefaultOptions());
    
    	return $this;
    }
    
    public function getDefaultOptions()
    {
        return array (
            'data_class' => 'AIOMedia\MediaBundle\Entity\Tag\AbstractTag',
        );
    }
} 