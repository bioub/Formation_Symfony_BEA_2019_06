<?php


namespace AppBundle\Tests\Entity;


use AppBundle\Entity\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    public function testGetSetPrenom()
    {
        $contact = new Contact();
        $contact->setPrenom('Romain');

        $this->assertEquals($contact->getPrenom(), 'Romain');
    }
}