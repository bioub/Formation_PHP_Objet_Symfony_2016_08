<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Societe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/societe")
 */
class SocieteController extends Controller
{

    /**
     * @return \AppBundle\Repository\SocieteRepository
     */
    protected function getRepository()
    {
        return $this->getDoctrine()->getRepository('AppBundle:Societe');
    }

    /**
     * @Route("/")
     */
    public function listAction()
    {
        return $this->render('AppBundle:Societe:list.html.twig', array(
            'societes' => $this->getRepository()->findAll()
        ));
    }

    /**
     * @Route("/{id}")
     */
    public function showAction(Societe $societe)
    {
        return $this->render('AppBundle:Societe:show.html.twig', array(
            'societe' => $societe
        ));
    }

}
