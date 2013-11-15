<?php

namespace AIOMedia\MediaBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MediaFileType extends MediaType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	parent::buildForm($builder, $options);
    	
        $builder->add('file', 'file');

        if (!empty($options) && !empty($options['block_name']) && 'entry' === $options['block_name']) {
        	$builder->add('delete', 'submit');
        }
    }

    public function getName()
    {
        return 'media_file';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    	$resolver->setDefaults($this->getDefaultOptions());
    
    	return $this;
    }
    
    public function getDefaultOptions()
    {
        return array (
            'data_class' => 'AIOMedia\MediaBundle\Entity\AbstractMediaFile',
        );
    }
} 