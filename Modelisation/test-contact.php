<?php

use Prepavenir\Model\Entity\Contact;

require_once 'src/Model/Entity/Contact.php';

$romain = new Contact();
$romain->setPrenom('Romain');

echo 'Bonjour je suis ' . $romain->getPrenom();
