<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Partie;
use AppBundle\Form\PartieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncode;

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

        $form->handleRequest($request); //synchronisation des données du formulaire avec l'objet $partie via le formType
        if ($form->isSubmitted() && $form->isValid())
        {
            //récupére la connexion à la BDD
            $em = $this->getDoctrine()->getManager();

            // initialisation des données de la partie

            //récupération de toutes les bornes
            $bornes = $em->getRepository("AppBundle:Borne")->findAll();

            $tborne=array(); //tableau qui sera sauvegardé dans la BDD
            $ordre = 1; //ordre des bornes
            foreach ($bornes as $borne)
            {
                $tborne[$ordre] = array('id_borne' => $borne->getId(),
                                        'position' => 'neutre');
                $ordre ++;
            }
            //sauvegarde la liste des bornes dans ma partie
            $partie->setListeDesBornes($tborne);

            $cartes = $em->getRepository('AppBundle:Carte')->findAll();
            $tcarte = array();
            foreach ($cartes as $carte)
            {
                $tcarte[] = $carte->getId(); //sauvegarde les id des cartes dans un tableau
            }

            shuffle($tcarte); //mélange du tableau

            //distribution de la main de J1
            $mainJ1=array();
            for($i = 0; $i<6; $i++)
            {
                $mainJ1[] = $tcarte[$i];
            }
            $partie->setMainj1($mainJ1);

            //distributoon de la main de J2
            $mainJ2=array();
            for($i = 6; $i<12; $i++)
            {
                $mainJ2[] = $tcarte[$i];
            }
            $partie->setMainj2($mainJ2);

            $pioche=array();
            for($i = 12; $i < count($tcarte); $i++)
            {
                $pioche[] = $tcarte[$i];
            }
            $partie->setPioche($pioche);

            $partie->setTourJoueur($partie->getJoueur1());

            $em->persist($partie);
            $em->flush();

            // redirection vers la distribution des cartes
        }

        return $this->render(':JouerController:nouvelle_partie.html.twig', array(
            'form' => $form->createView()
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
