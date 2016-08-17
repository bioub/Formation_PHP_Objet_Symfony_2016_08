<?php

namespace AppBundle\Controller;

use AppBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
    public function addAction(Request $request)
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $contact = $form->getData();

            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($contact);
            $em->flush();

            //$this->redirectToRoute('app_contact_show', ['id' => $contact->getId()]);

            $this->addFlash('success', 'Le contact a bien été inséré');

            return $this->redirectToRoute('app_contact_list');
        }

        return $this->render('AppBundle:Contact:add.html.twig', array(
            'contactForm' => $form->createView()
        ));
    }

    /**
     * @Route("/{id}")
     */
    public function showAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Contact');

        $contact = $repository->find($id);

        if (!$contact) {
            // TODO 404
            throw new NotFoundHttpException('Ce contact n\'existe pas');
        }

        return $this->render('AppBundle:Contact:show.html.twig', array(
            'contact' => $contact
        ));
    }

}
