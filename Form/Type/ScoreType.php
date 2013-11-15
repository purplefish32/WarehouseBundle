<?php

namespace AIOMedia\MediaBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ScoreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//         $builder->add('name', 'text');
    }

    public function getName()
    {
        return 'score';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    	$resolver->setDefaults($this->getDefaultOptions());
    
    	return $this;
    }
    
    public function getDefaultOptions()
    {
        return array (
            'data_class' => 'AIOMedia\MediaBundle\Entity\Score\ScorableInterface',
        );
    }
} 