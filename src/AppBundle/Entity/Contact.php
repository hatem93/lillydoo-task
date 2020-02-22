<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="contact")
 */
class Contact
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $street;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $zip;

    /**
     * @ORM\Column(type="integer")
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $emailAddress;

    /**
     * @ORM\Column(type="text", length=100, nullable=true)
     */
    private $picture;
}