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
    private $age;
    private $email;

    /**
     * Konstruktor
     */
    public function __construct($firstName, $lastName, $gender)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->age = rand(1, 100);
        $this->email = $this->createEmail();
    }

    /**
     * En metdod som genererar en epostadress
     */
    public function createEmail()
    {
        $email = $this->firstName . '.' . $this->lastName . '@example.com';
        $email = mb_strtolower($email);
        // https://www.php.net/manual/en/function.mb-strtolower

        $search  = array('å', 'ä', 'ö', 'é', '-', ' ');
        $replace = array('a', 'a', 'o', 'e', '',  '');
        $email = str_replace($search, $replace, $email);

        return $email;
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
            "age"        => $this->age,
            "email"      => $this->email
        );

        // print_r($array);
        
        return $array;
    }
}