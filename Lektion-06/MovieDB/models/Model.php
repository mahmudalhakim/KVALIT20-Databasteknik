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

    public function fetchAllMovies()
    {
        $movies = $this->db->select("SELECT * FROM films");
        return $movies;
    }
    
    public function fetchMovieById($id)
    {
        $statement = "SELECT * FROM films WHERE film_id=:id";
        $parameters = array(':id' => $id);
        $movie = $this->db->select($statement, $parameters);

        // print_r($movie);

        if ($movie) {
            
            return $movie[0];
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


    public function saveOrder($customer_id, $movie_id)
    {
        $customer = $this->fetchCustomerById($customer_id);

        if ($customer) {

            $statement = "INSERT INTO orders (customer_id, film_id)  
                          VALUES (:customer_id, :film_id)";
            $parameters = array(
                ':customer_id' => $customer_id,
                ':film_id' => $movie_id
            );

            $lastInsertId = $this->db->insert($statement, $parameters);

            return array('customer' => $customer, 'lastInsertId' => $lastInsertId);
        } else {
            return false;
        }
    }
}
