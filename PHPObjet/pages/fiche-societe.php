<?php
require_once 'vendor/autoload.php';

// doctrine model
$contact1 = new \BEA\Entity\Contact();
$contact1->setPrenom('Romain')
        ->setNom('Bohdanowicz');

$contact2 = new \BEA\Entity\Contact();
$contact2->setPrenom('A')
    ->setNom('B');

$societe = new \BEA\Entity\Societe();
$societe->setNom('formation.tech')
        ->setVille('Paris');

$societe->addContact($contact1)->addContact($contact2);

// view
echo $societe->getNom() . "\n";

foreach ($societe->getContacts() as $contact) {
    echo $contact->getPrenom() . "\n";
}