<?php

use Prepavenir\Model\Entity\Contact;

require_once 'vendor/autoload.php';

$prenom1 = 'Jean';
$prenom2 = $prenom1;
$prenom2 = 'Eric';

echo $prenom1 . "\n"; // Jean

$contact1 = new Contact();
$contact1->setPrenom('Jean');
$contact2 = $contact1;
$contact2->setPrenom('Eric');

echo $contact1->getPrenom() . "\n"; // Eric