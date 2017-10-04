<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Partie;
use AppBundle\Form\PartieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class JouerController
 * @package AppBundle\Controller
 * @Route("/jouer")
 */
class JouerController extends Controller
{
    /**
     * @Route("/nouvelle-partie")
     */
    public function nouvellePartieAction()
    {
        $partie = new Partie();
        $form = $this->createForm(PartieType::class, $partie);


        return $this->render(':JouerController:nouvelle_partie.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/distribuer-cartes")
     */
    public function distribuerCartesAction()
    {
        return $this->render(':JouerController:distribuer_cartes.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/piocher")
     */
    public function piocherAction()
    {
        return $this->render(':JouerController:piocher.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/revendiquerBorne")
     */
    public function revendiquerBorneAction()
    {
        return $this->render(':JouerController:revendiquer_borne.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/afficher")
     */
    public function afficherPlateauAction()
    {
        return $this->render(':JouerController:afficher_plateau.html.twig', array(
            // ...
        ));
    }

}
