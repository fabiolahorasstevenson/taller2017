<?php

namespace EspectaculosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $espectaculos = $this->getDoctrine()->getRepository('EspectaculosBundle:Espectaculo')->findAll();

        return $this->render('EspectaculosBundle:Default:index.html.twig', array(
        	'espectaculos' => $espectaculos
        ));
    }
	/**
     * @Route("/espectaculo/{id}", name="show_espectaculo")
     */
    public function showAction ($id)
    {
    	$espectaculos = $this->getDoctrine()->getRepository('EspectaculosBundle:Espectaculo')->find($id);

    	return $this->render('EspectaculosBundle:Default:show.html.twig',array(
    		'espectaculos' => $espectaculos
    	));
    }    
}

