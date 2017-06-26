<?php

namespace EspectaculosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use EspectaculosBundle\Entity\Sala;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/salas")
 */
class SalasController extends Controller
{
    /**
     * @Route("/", name= "sala_index" )
     */
    public function indexAction()
    {
        $salas = $this->getDoctrine()->getRepository('EspectaculosBundle:Sala')->findAll();

        return $this->render('EspectaculosBundle:Salas:index.html.twig', array(
        	'salas' => $salas
        ));
    }

     /**
     * @Route("/new", name="new_sala")
     */
    public function newAction(Request $request)  
    {

        $sala = new Sala();
        $form= $this->createFormBuilder($sala)
            ->add('nombre','text')
            ->add('descripcion','text')
            ->add('direccion','text')
            ->add('imagen','text')
            ->add('latitud','text')
            ->add('longitud','text')
            ->add('Guardar','submit')
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid())
        {
            // guardar el objeto en la base
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($sala);
            $em->flush();
            return $this->redirect($this->generateUrl('sala_index'));
        }

        return $this->render('EspectaculosBundle:Salas:new.html.twig',array
            ('form'=> $form->createView(),
        ));
    }

    /**
     * @Route("/edit/{id}", name="edit_sala")
     */
    public function editAction($id)  
    {

        $salas = $this->getDoctrine()->getRepository('EspectaculosBundle:Sala')->find($id);

        $form= $this->createFormBuilder($salas)
            ->add('nombre','text')
            ->add('descripcion','text')
            ->add('direccion','text')
            ->add('imagen','text')
            ->add('latitud','text')
            ->add('longitud','text')
            ->add('Guardar','submit')
            ->getForm();

        $request = $this->getRequest();
        $form->handleRequest($request);
        if ($form->isValid())
        {
            // guardar el objeto en la base
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($salas);
            $em->flush();
            return $this->redirect($this->generateUrl('sala_index'));
        }

        return $this->render('EspectaculosBundle:Salas:edit.html.twig',array
            ('form'=> $form->createView(),
        ));
    }

  	/**
     * @Route("/show/{id}", name="show_sala")
     */
    public function showAction ($id)
    {
    	$salas = $this->getDoctrine()->getRepository('EspectaculosBundle:Sala')->find($id);

    	return $this->render('EspectaculosBundle:Salas:show.html.twig',array(
    		'salas' => $salas
    	));
    }  

   
}