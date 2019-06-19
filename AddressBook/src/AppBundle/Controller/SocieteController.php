<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Entity\Societe;
use AppBundle\Form\SocieteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Societe controller.
 *
 * @Route("societes")
 */
class SocieteController extends Controller
{
    /**
     * Lists all societe entities.
     *
     * @Route("/")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $societes = $em->getRepository('AppBundle:Societe')->findAll();

        return $this->render('societe/index.html.twig', array(
            'societes' => $societes,
        ));
    }


    /**
     * @Route("/add")
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(SocieteType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Societe $entity */
            $entity = $form->getData();

            $em = $this->getDoctrine()->getManager(); // Manager pour les écritures
            $em->persist($entity);
            $em->flush();

            $this->addFlash('success', $entity->getNom() . ' a bien été créé');

            // return $this->redirectToRoute('app_contact_show', ['id' => $contact->getId()]);
            return $this->redirectToRoute('app_societe_index');
        }

        return $this->render('societe/create.html.twig', array(
            'societeForm' => $form->createView(),
        ));
    }
    /**
     * Finds and displays a societe entity.
     *
     * @Route("/{id}")
     * @Method("GET")
     */
    public function showAction(Societe $societe)
    {


        return $this->render('societe/show.html.twig', array(
            'societe' => $societe,
        ));
    }


}
