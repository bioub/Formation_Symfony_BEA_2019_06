<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
        // Keep Thin Controllers and Fat Models
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
        // FQCN Fully Qualified ClassName : nom complet de la classe avec les namespace
        $repo = $this->getDoctrine()->getRepository(Contact::class);

        $contact = $repo->find($id);

        if (!$contact) {
            throw $this->createNotFoundException('Contact not found');
        }

        return $this->render('contact/show.html.twig', [
            'contact' => $contact,
        ]);
    }

    /**
     * @Route("/{id}/update/", requirements={"id": "[1-9][0-9]*"})
     */
    public function updateAction(Contact $contact, Request $request)
    {
       // $repo = $this->getDoctrine()->getRepository(Contact::class);
       // $contact = $repo->find($id);

        $form = $this->createForm(ContactType::class);
        $form->setData($contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Contact $contact */
            $contact = $form->getData();

            $em = $this->getDoctrine()->getManager(); // Manager pour les écritures
            $em->persist($contact);
            $em->flush();

            $this->addFlash('success', $contact->getPrenom() . ' a bien été modifié');

            // return $this->redirectToRoute('app_contact_show', ['id' => $contact->getId()]);
            return $this->redirectToRoute('app_contact_list');
        }

        return $this->render('contact/update.html.twig', [
            'contactForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/ajax/{id}/", requirements={"id": "[1-9][0-9]*"})
     * @Method("DELETE")
     */
    public function deleteAjaxAction(Contact $contact)
    {
        $serializer = $this->container->get('serializer');
        $response = new JsonResponse();
        $response->setContent($serializer->serialize($contact, 'json'));

        $em = $this->container->get('doctrine')->getManager();
        $em->remove($contact);
        $em->flush();

        return $response;
    }
}
