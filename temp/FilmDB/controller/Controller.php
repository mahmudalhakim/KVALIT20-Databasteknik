<?php

class Controller
{
    private $model = null;
    private $view = null;

    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    public function getHeader()
    {
        $this->view->viewHeader();
    }

    public function getFooter()
    {
        $this->view->viewFooter();
    }

    public function getFilms()
    {
        $this->model->fetchAllFilms();
    }

    public function getOrderForm()
    {
        $id = $this->sanitize($_GET['id']);
        $film = $this->model->fetchFilmById($id);

        if ($film) {
            $this->view->viewOrderForm($film);
        } else {
            header("Location:index.php");
        }
    }

    public function processOrderForm()
    {
        $film_id     = $this->sanitize($_POST['film_id']);
        $customer_id = $this->sanitize($_POST['customer_id']);
        $this->model->saveOrder($customer_id, $film_id);
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
