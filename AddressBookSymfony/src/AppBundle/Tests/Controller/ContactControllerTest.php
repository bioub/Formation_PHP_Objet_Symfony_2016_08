<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Repository\ContactRepository;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    protected function setUp()
    {
        // TODO alice:load...
    }

    /*
     * Test fonctionnel : du point de vue du client
     * On envoit une requête à Symfony et on vérifie les données
     * dans la réponse
     *
     * Problème : Celui-ci dépend de la base de données,
     * si elle évolue le test va échouer (nouveau contact)
     *
     * 2 solutions :
     * 1 - recharger un jeu de test entre chaque test (lourd et long)
     * 2 - remplacer le composant chargé de récupérer les données
     * en base par un faux qui récupère des données locales
     */
    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contact/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals('Liste des contacts', $crawler->filter('h2')->text());

        $this->assertCount(50, $crawler->filter('table.table tr'));
        $this->assertContains('Jeanne Techer', $crawler->filter('table.table tr:first-child td:first-child')->text());
    }

    /*
     * Solution 2 :
     * PHPUnit contient une bibliothèque pour faciliter la création de faux services
     * qui se comportent comme les vrais mais pour lesquels on peut remplacer certaines méthodes
     * Grace au container de Symfony on va pouvoir utiliser les faux à la place des vrais services
     * dans le cadre du tests (donc par exemple ne pas faire les requetes en base)
     *
     * Le problème ici : le controlleur dépend de Doctrine\Registry, donc en plus de faire une fausse
     * méthode findAll dans le faux repository il faut faire un faux Doctrine\Registry pour pouvoir
     * remplacer dans l'annuaire (container)
     *
     * Idéalement le controlleur dépend d'une couche service qui est dans l'annuaire (container)
     */
    public function testListAvecMock()
    {
        $client = static::createClient();

        $contacts = [
            (new Contact())->setId(23)->setPrenom('Jean')->setNom('Dupont'),
            (new Contact())->setId(324)->setPrenom('Eric')->setNom('Martin'),
        ];

        $mockRepository = $this->getMockBuilder(ContactRepository::class)
                             ->disableOriginalConstructor()
                             ->disableOriginalClone()
                             ->getMock();

        $mockRepository->expects($this->once())
                       ->method('findAll')
                       ->willReturn($contacts);


        $mockDoctrine = $this->getMockBuilder(Registry::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->getMock();

        $mockDoctrine->expects($this->once())
            ->method('getRepository')
            ->willReturn($mockRepository);

        $client->getContainer()->set('doctrine', $mockDoctrine);

        $crawler = $client->request('GET', '/contact/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals('Liste des contacts', $crawler->filter('h2')->text());

        $this->assertCount(2, $crawler->filter('table.table tr'));
        $this->assertContains('Jean Dupont', $crawler->filter('table.table tr:first-child td:first-child')->text());

    }


    public function testListAvecMockAvecProphecy()
    {
        $client = static::createClient();

        $contacts = [
            (new Contact())->setId(23)->setPrenom('Jean')->setNom('Dupont'),
            (new Contact())->setId(324)->setPrenom('Eric')->setNom('Martin'),
        ];

        $mockRepository = $this->prophesize(ContactRepository::class);
        $mockRepository->findAll()->willReturn($contacts)->shouldBeCalled();

        $mockDoctrine = $this->prophesize(Registry::class);
        $mockDoctrine->getRepository('AppBundle:Contact')->willReturn($mockRepository->reveal());
        $mockDoctrine->getConnectionNames()->shouldBeCalled();
        $mockDoctrine->getManagerNames()->shouldBeCalled();

        $client->getContainer()->set('doctrine', $mockDoctrine->reveal());

        $crawler = $client->request('GET', '/contact/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals('Liste des contacts', $crawler->filter('h2')->text());

        $this->assertCount(2, $crawler->filter('table.table tr'));
        $this->assertContains('Jean Dupont', $crawler->filter('table.table tr:first-child td:first-child')->text());

    }

}
