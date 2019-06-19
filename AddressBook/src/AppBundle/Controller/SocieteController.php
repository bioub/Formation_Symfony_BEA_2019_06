<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Societe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
