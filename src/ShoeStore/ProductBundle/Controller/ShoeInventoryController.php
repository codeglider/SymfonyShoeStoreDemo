<?php

namespace ShoeStore\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ShoeStore\ProductBundle\Entity\Shoes;
use Symfony\Component\HttpFoundation\Request;
use ShoeStore\ProductBundle\Form\ShoesType;

class ShoeInventoryController extends Controller
{
    public function displayAction(Request $request)
    {
		// create a shoes and give it some dummy data for this example
        //$shoes = new Shoes();
        //$shoes->setModelName('Nike Air');
        //$shoes->setModelNumber('5839584593');
		//$shoes->setModelImage('/image/something');
		//$shoes->setMsrPrice(125.25);

		//fresh task object without dummy data
		$shoes = new Shoes();
		
        /*$form = $this->createFormBuilder($shoes)
            ->add('modelName', 'text')
            ->add('modelNumber', 'text')
			->add('modelImage', 'text')
			->add('msrPrice', 'money', array('divisor' => 100, ))
            ->add('save', 'submit', array('label' => 'Create Shoes'))
			->add('saveAndAdd', 'submit', array('label' => 'Save and Add'))
            ->getForm();*/
		
		//$form = $this->createForm(new ShoesType());
		$form = $this->createForm('shoes', $shoes);
	
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			// perform some action, such as saving the task to the database
			$nextAction = $form->get('saveAndAdd')->isClicked()?'task_new':'task_success';
			
			return $this->redirect($this->generateUrl('task_success'));
		}
		
        return $this->render('ShoeStoreProductBundle:ShoeInventory:display.html.twig', array(
                'form' => $form->createView(),
            ));    
	}

}
