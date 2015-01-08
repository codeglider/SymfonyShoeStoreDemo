<?php

namespace ShoeStore\ProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use ShoeStore\ProductBundle\Form\CategoryType;

class ShoesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('modelName')
            ->add('modelNumber')
            ->add('modelImage')
            ->add('msrPrice', 'money', array('divisor' => 100, ))
			->add('keepInactive', 'checkbox', array('mapped' => false, 'label' => 'Keep As Inactive Inventory'))
			//->add('category', new CategoryType())
			->add('save', 'submit', array('label' => 'Create Shoes'))
			->add('saveAndAdd', 'submit', array('label' => 'Save and Add'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ShoeStore\ProductBundle\Entity\Shoes'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'shoes';
    }
}
