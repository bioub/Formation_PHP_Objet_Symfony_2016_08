<?php

use Prepavenir\Model\Entity\Contact;
use Prepavenir\Model\Mapper\ContactMapper;

require_once 'vendor/autoload.php';

$contact = new Contact();
$contact->setPrenom('Romain')
        ->setNom('Bohdanowicz');

$dsn = 'mysql:host=localhost;dbname=prepavenir_addressbook;charset=UTF8';
$username = 'root';
$passwd = '';

$pdo = new PDO($dsn, $username, $passwd);

$mapper = new ContactMapper($pdo);
$mapper->save($contact);



