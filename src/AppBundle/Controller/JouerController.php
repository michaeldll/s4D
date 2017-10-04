<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Partie;
use AppBundle\Form\PartieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

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
    public function nouvellePartieAction(Request $request)
    {
        $partie = new Partie();
        $form = $this->createForm(PartieType::class, $partie);

        if ($request->isMethod('POST'))
        {
            // traitement du formulaire
            // ajout des joueurs à la partie
            // initialisation des données de la partie
            // redirection vers la distribution des cartes
        }

        return $this->render(':JouerController:nouvelle_partie.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/distribuer-cartes")
     */
    public function distribuerCartesAction()
    {
        //récupérer l'ensemble des cartes
        //mélnager les cartes
        //distribuer les cartes aux joueurs
        //créer la pioche
        //rediriger vers l'affichage du plateau


        return $this->render(':JouerController:distribuer_cartes.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/afficher")
     */
    public function afficherPlateauAction()
    {
        // Afficher le plateau

        return $this->render(':JouerController:afficher_plateau.html.twig', array(
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



}
