<?php

namespace AppBundle\Tests\Controller;

use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function setUp()
    {
        self::bootKernel();
    }

    private function getEntityManager()
    {
        return self::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testCompleteScenario()
    {
        $purger = new ORMPurger($this->getEntityManager());
        $purger->purge();
        // Create a new client to browse the application
        $client = static::createClient();
        $faker = Factory::create();

        // Create a new entry in the database
        $crawler = $client->request('GET', '/contact');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(),
            "Unexpected HTTP status code for GET /contact/");
        $crawler = $client->click($crawler->selectLink('Add New Contact')->link());

        // Fill in the form and submit it
        $form = $crawler->selectButton('Create')->form(array(
            'appbundle_contact[firstName]' => 'asd',
            'appbundle_contact[lastName]' => 'asd',
            'appbundle_contact[street]' => 'asd',
            'appbundle_contact[city]' => 'asd',
            'appbundle_contact[country]' => 'asd',
            'appbundle_contact[birthday]' => '01/20/1990',
            'appbundle_contact[emailAddress]' => 'asd@asd.com',
            'appbundle_contact[phoneNumber]' => '123123123',
            'appbundle_contact[zip]' => 123132,
            'appbundle_contact[picture]' => "https://test.com/asd.img"
        ));

        $client->submit($form);
        $crawler = $client->request('GET', '/contact');

        // Check that the user was created
        $this->assertEquals(1, $crawler->filter('.profile_view')->count(), 'The User card wasn\'t created');

        // Edit the entity
        $crawler = $client->click($crawler->filter('.edit-profile')->links()[0]);

        $editedValue = "new_email@email.com";
        $form = $crawler->selectButton('Edit')->form(array(
            'appbundle_contact[firstName]' => 'asd2',
            'appbundle_contact[lastName]' => 'asd',
            'appbundle_contact[street]' => "asd",
            'appbundle_contact[city]' => 'asd',
            'appbundle_contact[country]' => 'asd',
            'appbundle_contact[birthday]' => '01/20/1990',
            'appbundle_contact[emailAddress]' => $editedValue,
            'appbundle_contact[phoneNumber]' => '123123123',
            'appbundle_contact[zip]' => 123132,
            'appbundle_contact[picture]' => "https://test.com/asd.img"
        ));

        $client->submit($form);
        $crawler = $client->request('GET', '/contact');

        // Check that the email was edited in the view.
        $this->assertEquals(1, $crawler->filter('.profile_view')->count(), 'The User card was not found');
        $this->assertEquals($editedValue, $crawler->filter('#profile_email')->html(), 'Profile Email wasn\'t edited');
    }
}
