<?php

namespace EspectaculosBundle\Controller;

use EspectaculosBundle\Entity\Espectaculo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Espectaculo controller.
 *
 * @Route("espectaculo")
 */
class EspectaculoController extends Controller
{
    /**
     * Lists all espectaculo entities.
     *
     * @Route("/", name="espectaculo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $espectaculos = $em->getRepository('EspectaculosBundle:Espectaculo')->findAll();

        return $this->render('espectaculo/index.html.twig', array(
            'espectaculos' => $espectaculos,
        ));
    }

    /**
     * Creates a new espectaculo entity.
     *
     * @Route("/new", name="espectaculo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $espectaculo = new Espectaculo();
        $form = $this->createForm('EspectaculosBundle\Form\EspectaculoType', $espectaculo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($espectaculo);
            $em->flush();

            return $this->redirectToRoute('espectaculo_show', array('id' => $espectaculo->getId()));
        }

        return $this->render('espectaculo/new.html.twig', array(
            'espectaculo' => $espectaculo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a espectaculo entity.
     *
     * @Route("/{id}", name="espectaculo_show")
     * @Method("GET")
     */
    public function showAction(Espectaculo $espectaculo)
    {
        $deleteForm = $this->createDeleteForm($espectaculo);

        return $this->render('espectaculo/show.html.twig', array(
            'espectaculo' => $espectaculo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing espectaculo entity.
     *
     * @Route("/{id}/edit", name="espectaculo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Espectaculo $espectaculo)
    {
        $deleteForm = $this->createDeleteForm($espectaculo);
        $editForm = $this->createForm('EspectaculosBundle\Form\EspectaculoType', $espectaculo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('espectaculo_edit', array('id' => $espectaculo->getId()));
        }

        return $this->render('espectaculo/edit.html.twig', array(
            'espectaculo' => $espectaculo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a espectaculo entity.
     *
     * @Route("/{id}", name="espectaculo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Espectaculo $espectaculo)
    {
        $form = $this->createDeleteForm($espectaculo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($espectaculo);
            $em->flush();
        }

        return $this->redirectToRoute('espectaculo_index');
    }

    /**
     * Creates a form to delete a espectaculo entity.
     *
     * @param Espectaculo $espectaculo The espectaculo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Espectaculo $espectaculo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('espectaculo_delete', array('id' => $espectaculo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
