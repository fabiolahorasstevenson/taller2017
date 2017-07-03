<?php

namespace EspectaculosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/")
 */
class EspectaculosController extends Controller
{
    /**
     * @Route("/", name= "espectaculos_index")
     */
    public function indexAction(Request $request)
    {
        #$translator = $this->get('translator');
        #$translator->setLocale('it_IT');
   
        #$translated = $translator->trans('Symfony2 is great');
        #echo $translated;  
        #$this->get('session')->setLocale('en_US');

        #$locale = $request->getLocale();
        #echo $locale;
        

        # $espectaculos = $this->getDoctrine()->getRepository('EspectaculosBundle:Espectaculo')->findAll();

        $form = $this->createFormBuilder()    
                     -> setMethod('GET')
                     -> add ('Nombre','text',array('required' =>false))
                     -> add ('Descripcion','text',array('required' =>false))
                     -> add ('Fecha','date',array('required' =>false))
                     -> add ('Sala','entity', array('property' => 'nombre', 'class' => 'EspectaculosBundle:Sala', 'placeholder' => 'seleccione', 'empty_value' => 0,'required' => false))
                     -> add ('TipoEspectaculo','entity',array('property' => 'nombre', 'class' => 'EspectaculosBundle:Tipo', 'placeholder' => 'seleccione', 'empty_value' => 0, 'required' => false))
                     -> add ('filtrar','submit')
                     -> getForm();


        $qb = $this->getDoctrine()->getManager()->createQueryBuilder('p');
        $qb-> select('p')
           -> from('EspectaculosBundle:Espectaculo','p');

        $form ->handleRequest($request);
        if ($form->isValid())
        { 
            $criteria= $form->getData();
            #dump($criteria);
            #die();
            $qb->where('1=1');
            if (isset($criteria['Sala']))
            {
               $qb ->andWhere('p.sala = :sala')
                   ->setParameter('sala',$criteria['Sala']);
            } 
            if (isset($criteria['TipoEspectaculo']))
            {
               $qb ->andWhere('p.tipoespectaculo = :tipo')
                   ->setParameter('tipo',$criteria['TipoEspectaculo']);
            } 
            
            if (isset($criteria['Nombre']))
            {    
                $qb ->andWhere($qb->expr()->like('p.nombre','?1'))
                    ->setParameter(1,'%'.$criteria['Nombre'].'%');
            }
            if(isset($criteria['Descripcion']))
            {    
                $qb ->andWhere($qb->expr()->like('p.descripcion','?2'))
                    ->setParameter(2,'%'.$criteria['Descripcion'].'%');
            }

            if(isset($criteria['Fecha']))
            {
               $qb ->andWhere('?3 >= p.fechaInicio')
                   ->andWhere('?4 <= p.fechaFin')
                   ->setParameter('3',$criteria['Fecha']->format('Y-m-d'))
                   ->setParameter('4',$criteria['Fecha']->format('Y-m-d'));
            }  
            
                
        }   

      

        $espectaculos = $qb->getQuery()->getResult();

        return $this->render('EspectaculosBundle:EspectaculosFrontend:index.html.twig', array(
        	'espectaculos' => $espectaculos, 'form'=> $form->createView(),
        ));
    }

	/**
     * @Route("/espectaculos/{id}", name="espectaculos_show")
     */
    public function showAction ($id)
    {
        $espectaculos = $this->getDoctrine()->getRepository('EspectaculosBundle:Espectaculo')->find($id);

    	return $this->render('EspectaculosBundle:EspectaculosFrontend:show.html.twig',array(
    		'espectaculos' => $espectaculos
    	));



    }    
}

