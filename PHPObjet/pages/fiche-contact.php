<?php
require_once 'vendor/autoload.php';

// doctrine model
$contact = new \BEA\Entity\Contact();
$contact->setPrenom('Romain')
        ->setNom('Bohdanowicz');

$societe = new \BEA\Entity\Societe();
$societe->setNom('formation.tech')
        ->setVille('Paris');

$contact->setSociete($societe);

// view
echo $contact->getPrenom() . "\n";
echo $contact->getSociete()->getNom() . "\n";