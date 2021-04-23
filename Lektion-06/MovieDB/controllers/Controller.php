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
        $this->router();
    }

    // My Simple Router
    public function router()
    {
        if (isset($_GET['page'])) {
            switch ($_GET['page']) {
                case "about":
                    $this->about();
                    break;
                case "order":
                    $this->order();
                    break;
                default:
                    http_response_code(404);
                    break;
            }
        } else {
            $this->getAllMovies();
        }
    }

    public function about()
    {
        $this->getHeader("Om Oss");
        $this->getFooter();
    }

    public function getHeader($title)
    {
        $this->view->viewHeader($title);
    }

    public function getFooter()
    {
        $this->view->viewFooter();
    }

    public function getAllMovies()
    {
        $this->getHeader("Välkommen");
        $movies = $this->model->fetchAllMovies();
        $this->view->viewAllMovies($movies);
        $this->getFooter();
    }

    public function order()
    {
        $this->getHeader("Beställningsformulär");
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
        $this->getFooter();
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
