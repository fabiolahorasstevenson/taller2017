<?php

namespace EspectaculosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use EspectaculosBundle\Entity\Tipo;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/tiposEspectaculos")
 */
class TiposEspectaculosController extends Controller
{
    /**
     * @Route("/", name= "tiposespectaculos_index")
     */
    public function indexAction()
    {
        $tiposEspectaculos = $this->getDoctrine()->getRepository('EspectaculosBundle:Tipo')->findAll();

        return $this->render('EspectaculosBundle:TiposEspectaculos:index.html.twig', array(
        	'tiposEspectaculos' => $tiposEspectaculos
        ));
    }

     /**
     * @Route("/new", name="new_tipoEspectaculo")
     */
    public function newAction(Request $request)  
    {

        $tipo = new Tipo();
        $form= $this->createFormBuilder($tipo)
            ->add('nombre','text')
            ->add('Guardar','submit')
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid())
        {
            // guardar el objeto en la base
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($tipo);
            $em->flush();
            return $this->redirect($this->generateUrl('tiposespectaculos_index'));
        }

        return $this->render('EspectaculosBundle:TiposEspectaculos:new.html.twig',array
            ('form'=> $form->createView(),
        ));
    }

    /**
     * @Route("/show/{id}", name="show_tipoEspectaculos")
     */
    public function showAction ($id)
    {
    	$tiposEspectaculos = $this->getDoctrine()->getRepository('EspectaculosBundle:Tipo')->find($id);

    	return $this->render('EspectaculosBundle:TiposEspectaculos:show.html.twig',array(
    		'tiposEspectaculos' => $tiposEspectaculos
    	));
    }  
   
}