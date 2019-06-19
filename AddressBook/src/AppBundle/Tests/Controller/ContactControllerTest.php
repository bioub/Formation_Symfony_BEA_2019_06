<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testListIsAccessible()
    {
        $client = static::createClient();

        $client->request('GET', '/contacts/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testListHasRightContent()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contacts/');

        $this->assertContains('Liste des contacts', $crawler->filter('h2')->text());
        $this->assertCount(2, $crawler->filter('table tr')); // MAUVAISE IDEE (dépend de la BDD)
    }

    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contacts/{id}');
    }

    public function testCreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contacts/add');
    }

}
