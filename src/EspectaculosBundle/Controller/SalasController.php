<?php

namespace EspectaculosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use EspectaculosBundle\Entity\Sala;
use Symfony\Component\HttpFoundation\Request;

class SalasController extends Controller
{
    /**
     * @Route("/salas", name= "sala_index")
     */
    public function indexAction()
    {
        $salas = $this->getDoctrine()->getRepository('EspectaculosBundle:Sala')->findAll();

        return $this->render('EspectaculosBundle:Salas:index.html.twig', array(
        	'salas' => $salas
        ));
    }
	/**
     * @Route("/salas/{id}", name="show_sala")
     */
    public function showAction ($id)
    {
    	$salas = $this->getDoctrine()->getRepository('EspectaculosBundle:Sala')->find($id);

    	return $this->render('EspectaculosBundle:Salas:show.html.twig',array(
    		'salas' => $salas
    	));
    }  

    /**
     * @Route("/salas/new", name="new_sala")
     */
    public function newAction()  
    {

        $sala = new Sala();
        $form= $this->createFormBuilder($sala)
            ->add('nombre','text')
            ->add('descripcion','text')
            ->add('direccion','text')
            ->add('imagen','text')
            ->add('latitud','text')
            ->add('longitud','text')
            ->getForm();

        return $this->render('EspectaculosBundle:Salas:new.html.twig',array
            ('form'=> $form->createView(),
        ));
    }
}