<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
        $contacts = [
            [
                'id' => 123,
                'prenom' => 'Romain',
                'nom' => 'Bohdanowicz',
            ],
            [
                'id' => 456,
                'prenom' => 'Eric',
                'nom' => 'Martin',
            ],
        ];

        return $this->render('contact/list.html.twig', array(
            'contacts' => $contacts
        ));
    }

    /**
     * @Route("/add/")
     */
    public function createAction()
    {
        return $this->render('contact/create.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/{id}/", requirements={"id": "[1-9][0-9]*"})
     */
    public function showAction($id)
    {
        $romain = [
            'prenom' => 'Romain',
            'nom' => 'Bohdanowicz',
        ];

        return $this->render('contact/show.html.twig', [
            'contact' => $romain,
        ]);
    }

}
