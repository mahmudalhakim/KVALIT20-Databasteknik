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
            $this->getFilms();
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

    public function getFilms()
    {
        $films = $this->model->fetchAllFilms();
        $this->view->viewFilms($films);
    }



    

    public function getOrderForm()
    {
        $id = $this->sanitize($_GET['id']);
        $film = $this->model->fetchFilmById($id);

        if ($film) {
            $this->view->viewFilm($film);
            $this->view->viewOrderForm($film);
        } else {
            header("Location:index.php");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->processOrderForm();
        }
    }

    public function processOrderForm()
    {
        $film_id     = $this->sanitize($_POST['film_id']);
        $customer_id = $this->sanitize($_POST['customer_id']);
        $confirm = $this->model->saveOrder($customer_id, $film_id);

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
