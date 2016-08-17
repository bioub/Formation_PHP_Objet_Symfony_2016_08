<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GroupeControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
    }

    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/{id}');
    }

    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ajouter');
    }

    public function testAttachcontact()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/attachContact');
    }

}
