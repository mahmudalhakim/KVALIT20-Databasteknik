<?php

/**
 * En klass som beskriver ett namn
 */
class Name
{
    /**
     * Instansvariabler
     */
    private $firstName;
    private $lastName;
    private $gender;

    /**
     * Konstruktor
     */
    public function __construct($firstName, $lastName, $gender)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
    }

    /**
     * En metdod som konverterar ett objekt till en array
     */
    public function toArray()
    {
        $array = array(
            "firstname"  => $this->firstName,
            "lastname"   => $this->lastName,
            "gender"     => $this->gender,
        );
        
        return $array;
    }
}