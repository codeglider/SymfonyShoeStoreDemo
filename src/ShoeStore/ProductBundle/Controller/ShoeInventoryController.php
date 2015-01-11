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
    	$em = $this->getDoctrine()->getManager();
		$shoes = new Shoes();
		$form = $this->createForm('shoes', $shoes);
	
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			// perform some action, such as saving the task to the database
			
			$shoe = $form->getData();
			$em->persist($shoe);
			$em->flush();
		
			return $this->redirect($this->generateUrl('display'));
		}

		$shoeInventory = $this->getDoctrine()
		->getRepository('ShoeStoreProductBundle:Shoes')
		->findAllShoes();
		
        return $this->render('ShoeStoreProductBundle:ShoeInventory:display.html.twig', array(
                'form' => $form->createView(), 'allShoes' => $shoeInventory
        ));    
	}
	
	public function editAction($id)
	{
		$em = $this->getDoctrine()->getManager();
		
		$shoeInventory = $this->getDoctrine()
		->getRepository('ShoeStoreProductBundle:Shoes')
		->findAllShoes();
		
		$shoes = $em->getRepository('ShoeStoreProductBundle:Shoes')->find($id);
		$form = $this->createForm('shoes', $shoes);
		
		if (!$shoes) {
			throw $this->createNotFoundException('Unable to find Shoe entity.');
		}
		
		return $this->render('ShoeStoreProductBundle:ShoeInventory:display.html.twig', array(
                'form' => $form->createView(), 'allShoes' => $shoeInventory
        ));
	}

}
