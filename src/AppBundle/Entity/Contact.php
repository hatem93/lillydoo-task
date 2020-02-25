<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=100)
     */
    private $firstName;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=100)
     */
    private $lastName;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=100)
     */
    private $street;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="integer",)
     */
    private $zip;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string",length=100)
     */
    private $city;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=100)
     */
    private $country;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=100)
     */
    private $phoneNumber;

    /**
     * @var string A "Y-m-d" formatted value
     * @Assert\NotBlank
     * @Assert\Date
     * @ORM\Column(type="string", length=100)
     */
    private $birthday;

    /**
     * @Assert\NotBlank
     * @Assert\Email(message = "The email '{{ value }}' is not a valid email.")
     * @ORM\Column(type="string", length=100)
     */
    private $emailAddress;

    /**
     * @Assert\Url(message = "The url '{{ value }}' is not a valid url")
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  mixed  $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param  mixed  $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param  mixed  $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param  mixed  $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param  mixed  $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param  mixed  $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param  mixed  $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param  mixed  $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param  mixed  $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param  mixed  $emailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param  mixed  $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }
}