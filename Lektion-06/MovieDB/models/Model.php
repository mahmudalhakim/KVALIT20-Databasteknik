<?php

// Tips
// Bra att läsa om "Dependency Injection"
// https://codeinphp.github.io/post/dependency-injection-in-php/

class Model
{
    private $db = null;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function fetchAllFilms()
    {
        $films = $this->db->select("SELECT * FROM films");
        return $films;
    }
    
    public function fetchFilmById($id)
    {
        $statement = "SELECT * FROM films WHERE film_id=:id";
        $parameters = array(':id' => $id);
        $film = $this->db->select($statement, $parameters);

        // print_r($film);

        if ($film) {
            
            return $film[0];
        }

        return false;
    }

   

    public function fetchCustomerById($id)
    {
        $statement = "SELECT * FROM customers WHERE customer_id=:id";
        $parameters = array(':id' => $id);
        $customer = $this->db->select($statement, $parameters);

        if ($customer) {
            return $customer[0];
        }

        return false;
    }


    public function saveOrder($customer_id, $film_id)
    {
        $customer = $this->fetchCustomerById($customer_id);

        if ($customer) {

            $statement = "INSERT INTO orders (customer_id, film_id)  
                          VALUES (:customer_id, :film_id)";
            $parameters = array(
                ':customer_id' => $customer_id,
                ':film_id' => $film_id
            );

            $lastInsertId = $this->db->insert($statement, $parameters);

            return array('customer' => $customer, 'lastInsertId' => $lastInsertId);
        } else {
            return false;
        }
    }
}
