<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Groupe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/groupe")
 */
class GroupeController extends Controller
{
    /**
     * @Route("/")
     */
    public function listAction()
    {
        $repo = $this->getDoctrine()->getRepository(Groupe::class);

        return $this->render('AppBundle:Groupe:list.html.twig', array(
            'groupes' => $repo->findAll()
        ));
    }

    /**
     * @Route("/{id}")
     */
    public function showAction(Groupe $groupe)
    {
        return $this->render('AppBundle:Groupe:show.html.twig', array(
            'groupe' => $groupe
        ));
    }

    /**
     * @Route("/ajouter")
     */
    public function addAction()
    {
        return $this->render('AppBundle:Groupe:add.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/attachContact")
     */
    public function attachContactAction()
    {
        return $this->render('AppBundle:Groupe:attach_contact.html.twig', array(
            // ...
        ));
    }

}
