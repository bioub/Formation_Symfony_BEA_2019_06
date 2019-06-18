<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/contacts")
 */
class ContactController extends Controller
{
    /**
     * @Route("/")
     */
    public function listAction()
    {
        $repo = $this->getDoctrine()->getRepository(Contact::class); // Repository pour les lectures

        $contacts = $repo->findBy([], ['prenom' => 'ASC'], 100, 0);

        return $this->render('contact/list.html.twig', array(
            'contacts' => $contacts
        ));
    }

    /**
     * @Route("/add/")
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Contact $contact */
            $contact = $form->getData();

            $em = $this->getDoctrine()->getManager(); // Manager pour les écritures
            $em->persist($contact);
            $em->flush();

            $this->addFlash('success', $contact->getPrenom() . ' a bien été créé');

            // return $this->redirectToRoute('app_contact_show', ['id' => $contact->getId()]);
            return $this->redirectToRoute('app_contact_list');
        }

        return $this->render('contact/create.html.twig', array(
            'contactForm' => $form->createView(),
        ));
    }

    /**
     * @Route("/{id}/", requirements={"id": "[1-9][0-9]*"})
     */
    public function showAction($id)
    {
        $repo = $this->getDoctrine()->getRepository(Contact::class);

        $contact = $repo->find($id);

        if (!$contact) {
            throw $this->createNotFoundException('Contact not found');
        }

        return $this->render('contact/show.html.twig', [
            'contact' => $contact,
        ]);
    }

}
