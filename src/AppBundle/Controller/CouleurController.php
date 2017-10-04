<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Couleur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Couleur controller.
 *
 * @Route("administration/couleur")
 */
class CouleurController extends Controller
{
    /**
     * Lists all couleur entities.
     *
     * @Route("/", name="administration_couleur_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $couleurs = $em->getRepository('AppBundle:Couleur')->findAll();

        return $this->render('couleur/index.html.twig', array(
            'couleurs' => $couleurs,
        ));
    }

    /**
     * Creates a new couleur entity.
     *
     * @Route("/new", name="administration_couleur_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $couleur = new Couleur();
        $form = $this->createForm('AppBundle\Form\CouleurType', $couleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($couleur);
            $em->flush();

            return $this->redirectToRoute('administration_couleur_show', array('id' => $couleur->getId()));
        }

        return $this->render('couleur/new.html.twig', array(
            'couleur' => $couleur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a couleur entity.
     *
     * @Route("/{id}", name="administration_couleur_show")
     * @Method("GET")
     */
    public function showAction(Couleur $couleur)
    {
        $deleteForm = $this->createDeleteForm($couleur);

        return $this->render('couleur/show.html.twig', array(
            'couleur' => $couleur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing couleur entity.
     *
     * @Route("/{id}/edit", name="administration_couleur_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Couleur $couleur)
    {
        $deleteForm = $this->createDeleteForm($couleur);
        $editForm = $this->createForm('AppBundle\Form\CouleurType', $couleur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('administration_couleur_edit', array('id' => $couleur->getId()));
        }

        return $this->render('couleur/edit.html.twig', array(
            'couleur' => $couleur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a couleur entity.
     *
     * @Route("/{id}", name="administration_couleur_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Couleur $couleur)
    {
        $form = $this->createDeleteForm($couleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($couleur);
            $em->flush();
        }

        return $this->redirectToRoute('administration_couleur_index');
    }

    /**
     * Creates a form to delete a couleur entity.
     *
     * @param Couleur $couleur The couleur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Couleur $couleur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administration_couleur_delete', array('id' => $couleur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
