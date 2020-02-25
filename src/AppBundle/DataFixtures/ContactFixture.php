<?php


namespace AppBundle\DataFixtures;


use AppBundle\Entity\Contact;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ContactFixture implements FixtureInterface
{
    private $manager;
    private $faker;


    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        $this->faker = Factory::create();
        $this->createMany(Contact::class, 50, function(Contact $contact, $count) {
            $contact->setFirstName($this->faker->firstName);
            $contact->setLastName($this->faker->lastName);
            $contact->setStreet($this->faker->streetAddress);
            $contact->setCity($this->faker->city);
            $contact->setCountry($this->faker->country);
            $contact->setBirthday($this->faker->dateTimeThisCentury->format('Y-m-d'));
            $contact->setEmailAddress($this->faker->email);
            $contact->setPhoneNumber($this->faker->phoneNumber);
            $contact->setZip($this->faker->postcode);
            $contact->setPicture($this->faker->imageUrl($width = 114, $height = 86,"people"));
        });

        $manager->flush();
    }

    protected function createMany(string $className, int $count, callable $factory)
    {
        for ($i = 0; $i < $count; $i++) {
            $entity = new $className();
            $factory($entity, $i);
            $this->manager->persist($entity);
        }
    }

}