<?php

use Prepavenir\Model\Entity\Contact;
use Prepavenir\Model\Entity\Societe;

require_once 'vendor/autoload.php';

//require_once 'src/Model/Entity/Contact.php';

//function __autoload($fqcn) {
//
//    $classPath = str_replace('Prepavenir', 'src', $fqcn);
//    $classPath = str_replace('\\', '/', $classPath);
//
//    require_once $classPath . '.php';
//}

$romain = new Contact();
$romain->setPrenom('Romain')
       ->setNom('Bohdanowicz');

$romain->setNom('Bohdanowicz');

$formationtech = new Societe();
$formationtech->setNom('Formation.tech');

$romain->setSociete($formationtech);

$formationtech->addContact($romain);
$formationtech->addContact((new Contact())->setPrenom('Eric'));

echo 'Bonjour je suis ' . $romain->getPrenom() . ' je travaille chez ' .
    $romain->getSociete()->getNom() . "\n";

$contacts = $formationtech->getContacts();

foreach ($contacts as $c) {
    echo $c->getPrenom() . "\n";
}


$amis = new \Prepavenir\Model\Entity\Groupe();
$amis->setNom('Amis');

$travail = new \Prepavenir\Model\Entity\Groupe();
$travail->setNom('Travail');

$romain->addGroupe($amis);
$romain->addGroupe($travail);

foreach ($romain->getGroupes() as $g) {
    echo $g->getNom() . "\n";
}