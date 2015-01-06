<?php

namespace ShoeStore\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ShoeStoreProductBundle:Default:index.html.twig', array('name' => $name));
    }
}
