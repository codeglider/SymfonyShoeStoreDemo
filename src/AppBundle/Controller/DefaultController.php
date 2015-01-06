<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/home", name="homehomepage")
     */
    public function indexHomeAction(Request $request)
    {
		// is it an Ajax request?
        $isAjax = $request->isXmlHttpRequest();

        // what's the preferred language of the user?
        $language = $request->getPreferredLanguage(array('en', 'fr'));

        // get the value of a $_GET parameter
        $pageName = $request->query->get('page');

        // get the value of a $_POST parameter
        $pageName = $request->request->get('page');
		
		$session = $request->getSession();

		// store an attribute for reuse during a later user request
		$session->set('foo', 'bar');

		// get the value of a session attribute
		$foo = $session->get('foo');

		// use a default value if the attribute doesn't exist
		$foo = $session->get('foo', 'default_value');
		
		// store a message for the very next request
		$this->addFlash('notice', 'Congratulations, your action succeeded!');
		
        return $this->render('default/index.html.twig', array('isAjax' => $isAjax, 'language' => $language, 'pageName' => $pageName));
    }
	
	/**
     * @Route("/redir", name="redirHomePage")
     */
    public function indexRedAction()
    {
        return $this->redirectToRoute('hello', array('name' => 'Fabien'));
    }
	
	/**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return new Response('Welcome to Symfony!');
    }
	
	/**
     * @Route("/testMe", name="testMe")
     */
    public function testMeAction()
    {
        return $this->render('default/testMe.html.twig', array('name' => 'SPark'));
    }
	
	/**
	 * @Route("/hello/{name}.{_format}", defaults={"_format"="html"}, requirements = { "_format" = "html|xml|json" }, name="hello")
	 */
	public function hellAction($name, $_format)
	{
		return $this->render('default/hello.'.$_format.'.twig', array('name' => $name));
	}
	
	/**
	 * @Route("/createProduct", name="newProduct")
	 */
	public function createAction()
	{
		
		
		return new Response('Welcome to Symfony!');
		//return new Response('Created product id '.$product->getId());
	}
}
