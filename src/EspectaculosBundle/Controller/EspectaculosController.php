<?php

namespace EspectaculosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/espectaculos")
 */
class EspectaculosController extends Controller
{
    /**
     * @Route("/", name= "espectaculos_index")
     */
    public function indexAction(Request $request)
    {
        # $espectaculos = $this->getDoctrine()->getRepository('EspectaculosBundle:Espectaculo')->findAll();

        $form = $this->createFormBuilder()    
                     -> setMethod('GET')
                     -> add ('nombre','text')
                     -> add ('descripcion','text')
                     -> add ('filtrar','submit')
                     -> getForm();

        $qb = $this->getDoctrine()->getManager()->createQueryBuilder('p');
        $qb-> select('p')
           -> from('EspectaculosBundle:Espectaculo','p');

        $form ->handleRequest($request);
        if ($form->isValid()){
            $criteria= $form->getData();
            $qb-> where ($qb->expr()->like('p.nombre','?1'))
                ->setParameter(1,'%'.$criteria['nombre'].'%')
                ->andWhere($qb->expr()->like('p.descripcion','?2'))
                ->setParameter(2,'%'.$criteria['descripcion'].'%');
                
        }   

      

        $espectaculos = $qb->getQuery()->getResult();

        return $this->render('EspectaculosBundle:EspectaculosFrontend:index.html.twig', array(
        	'espectaculos' => $espectaculos, 'form'=> $form->createView(),
        ));
    }
	/**
     * @Route("/espectaculo/{id}", name="show_espectaculo")
     */
    public function showAction ($id)
    {
    	$espectaculos = $this->getDoctrine()->getRepository('EspectaculosBundle:Espectaculo')->find($id);

    	return $this->render('EspectaculosBundle:EspectaculosFrontend:show.html.twig',array(
    		'espectaculos' => $espectaculos
    	));
    }    
}

