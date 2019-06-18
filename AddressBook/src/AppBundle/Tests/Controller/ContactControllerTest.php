<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contacts');
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
