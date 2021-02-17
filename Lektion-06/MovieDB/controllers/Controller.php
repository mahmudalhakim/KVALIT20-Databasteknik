<?php

// Tips
// Bra att läsa om "Dependency Injection"
// https://codeinphp.github.io/post/dependency-injection-in-php/

class Controller
{
    private $model = null;
    private $view  = null;

    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    public function main()
    {
        $this->getHeader();

        if (!isset($_GET['id'])) {
            $this->getAllMovies();
        } else {
            $this->getOrderForm();
        }

        $this->getFooter();
    }

    public function getHeader()
    {
        $this->view->viewHeader("Videobutiken");
    }

    public function getFooter()
    {
        $this->view->viewFooter();
    }

    public function getAllMovies()
    {
        $movies = $this->model->fetchAllMovies();
        $this->view->viewAllMovies($movies);
    }



    

    public function getOrderForm()
    {
        $id = $this->sanitize($_GET['id']);
        $movie = $this->model->fetchMovieById($id);

        if ($movie) {
            $this->view->viewOneMovie($movie);
            $this->view->viewOrderForm($movie);
        } else {
            header("Location:index.php");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->processOrderForm();
        }
    }

    public function processOrderForm()
    {
        $movie_id     = $this->sanitize($_POST['film_id']);
        $customer_id = $this->sanitize($_POST['customer_id']);
        $confirm = $this->model->saveOrder($customer_id, $movie_id);

        if ($confirm) {
            $customer = $confirm['customer'];
            $lastInsertId = $confirm['lastInsertId'];
            $this->view->viewConfirmMessage($customer, $lastInsertId);
        } else {
            $this->view->viewErrorMessage($customer_id);
        }
    }


    /**
     * Sanitize Inputs
     * https://www.w3schools.com/php/php_form_validation.asp
     */
    public function sanitize($text)
    {
        $text = trim($text);
        $text = stripslashes($text);
        $text = htmlspecialchars($text);
        return $text;
    }
}
