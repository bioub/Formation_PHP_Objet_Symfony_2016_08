<?php

require_once 'vendor/autoload.php';

$film = new \Prepavenir\Exercice\Entity\Film();
$film->setTitre('Suicide Squad')
     ->setAnnee(2016);

$will = new \Prepavenir\Exercice\Entity\Acteur();
$will->setPrenom('Will')
     ->setNom('Smith');

$margot = new \Prepavenir\Exercice\Entity\Acteur();
$margot->setPrenom('Margot')
       ->setNom('Robbie');

$film->addActeur($will)
     ->addActeur($margot);

$david = new \Prepavenir\Exercice\Entity\Realisateur();
$david->setPrenom('David')
      ->setNom('Ayer');

$film->setRealisateur($david);

//// Fiche Allociné

echo 'Titre : ' . $film->getTitre() . "\n";
echo 'Année : ' . $film->getAnnee() . "\n";
echo 'Réalisateur : ' . $film->getRealisateur()->getPrenom() . ' ' .
                        $film->getRealisateur()->getNom() . "\n";

foreach ($film->getActeurs() as $acteur) {
    echo 'Acteur : ' . $acteur->getPrenom() . ' ' .
                       $acteur->getNom() . "\n";
}