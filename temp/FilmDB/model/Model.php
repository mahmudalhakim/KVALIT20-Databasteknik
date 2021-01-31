<?php

// Viktigt att läsa om "Dependency Injection"
// https://codeinphp.github.io/post/dependency-injection-in-php/

class Model
{
    private $db = null;
    private $view = null;

    public function __construct($database, $view)
    {
        $this->db = $database;
        $this->view = $view;
    }

    public function fetchFilmById($id)
    {
        $statement = "SELECT * FROM films WHERE film_id=:id";
        $parameters = array(':id' => $id);
        $film = $this->db->select($statement, $parameters);

        if ($film) {
            $this->view->viewFilm($film[0]);
            return $film[0];
        }

        return false;
    }

    public function fetchAllFilms()
    {
        $films = $this->db->select("SELECT * FROM films");

        foreach ($films as $key => $film) {
            $this->view->viewFilm($film);
        }

        return $films;
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

            $this->view->printMessage(
                "<h4>Tack $customer[name]</h4>
                <p>Vi kommer att skicka filmen till följande e-post:</p>
                <p>$customer[email]</p>
                <p>Ditt ordernummer är $lastInsertId </p>
                ",
                "success"
            );
        } else {
            $this->view->printMessage(
                "<h4>Kundnummer $customer_id finns ej i vårt kundregister!</h4>
                <h5>Kontakta kundtjänst</h5>
                ",
                "warning"
            );
        }
    }
}
