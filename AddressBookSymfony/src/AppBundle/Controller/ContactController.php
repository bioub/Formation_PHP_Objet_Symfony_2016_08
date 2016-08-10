<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/contact")
 */
class ContactController extends Controller
{
    /**
     * @Route("/")
     */
    public function listAction()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Contact');

        $listeContacts = $repository->findAll();

        return $this->render('AppBundle:Contact:list.html.twig', array(
            'contacts' => $listeContacts
        ));
    }

    /**
     * @Route("/ajouter")
     */
    public function addAction()
    {


        return $this->render('AppBundle:Contact:add.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/{id}")
     */
    public function showAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Contact');

        $contact = $repository->find($id);

        return $this->render('AppBundle:Contact:show.html.twig', array(
            'contact' => $contact
        ));
    }

}
