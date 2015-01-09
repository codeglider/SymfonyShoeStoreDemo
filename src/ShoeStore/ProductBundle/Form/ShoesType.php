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
            ->add('modelName', null, array('label' => 'Name Of Shoe', 'attr' => array('placeholder' => 'Name Of Model')))
            ->add('modelNumber', null, array('label' => 'Model #', 'attr' => array('placeholder' => 'Model Number')))
            ->add('modelImage', null, array('label' => 'Image Of Model', 'attr' => array('placeholder' => 'Image Url')))
            ->add('msrPrice', 'money', array('divisor' => 100, 'currency' => false, 'label' => 'Price (USD)', 'attr' => array('placeholder' => '$')))
			->add('keepInactive', 'checkbox', array('mapped' => false, 'label' => 'Keep As Inactive Inventory'))
			//->add('category', new CategoryType())
			->add('save', 'submit', array('label' => 'Save Shoe', 'attr' => array('class' => 'formSubmissionFancyButtons')))
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
