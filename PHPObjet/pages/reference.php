<?php
require_once 'vendor/autoload.php';

$s1 = 'Romain';
$s2 = $s1;
$s2 = 'Eric';
echo $s1 . "\n"; // Romain

$o1 = new \BEA\Entity\Contact();
$o1->setPrenom('Romain');
$o2 = $o1;
$o2->setPrenom('Eric');
echo $o1->getPrenom() . "\n"; // Eric
