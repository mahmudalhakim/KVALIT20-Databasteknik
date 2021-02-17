<?php

// Viktigt att läsa om PHP Templating och HEREDOC syntax!
// https://css-tricks.com/php-templating-in-just-php/

class View
{

    public function viewHeader($title)
    {
        $html = <<<HTML
            <!doctype html>
            <html lang="sv">
            <head>
            <meta charset="utf-8">
            <title>$title</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="styles/bootstrap.css">
            <link rel="stylesheet" href="styles/styles.css">
            </head>
            <body class="container">
            <h1 class="text-center">
            <a href="index.php">$title</a>
            </h1>
            <div class='row'>

        HTML;

        echo $html;
    }

    public function viewFooter()
    {
        $date = date('Y');

        $html = <<<HTML

            </div> <!-- row -->
            <footer class="text-center text-muted">
            <hr>
            <p>Copyright &copy; $date</p>
            </footer>
            </body>
            </html>
        HTML;

        echo $html;
    }

    public function viewOneMovie($movie)
    {
        $html = <<<HTML

            <div class="col-md-6">
                <a href="?id=$movie[film_id]">
                    <div class="card m-1">
                        <img class="card-img-top" src="images/$movie[image]" 
                             alt="$movie[title]">
                        <div class="card-body">
                            <div class="card-title text-center">
                                <h4>$movie[title]</h4>
                                <h5>Pris: $movie[price] kr</h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div>  <!-- col -->

        HTML;

        echo $html;
    }


    public function viewAllMovies($movies)
    {
        foreach ($movies as $key => $movie) {
            $this->viewOneMovie($movie);
        }
    }





    public function viewOrderForm($movie)
    {

        $html = <<<HTML

            <div class="col-md-6">
                <h3 class='text-center text-primary'>Beställningsformulär</h3>
            
                <form action="#" method="post">
                    <input type="hidden" name="film_id" 
                            value="$movie[film_id]">

                    <input type="number" name="customer_id" required 
                            class="form-control form-control-lg my-2" 
                            placeholder="Ange ditt kundnummer">
                
                    <input type="submit" class="form-control my-2 btn btn-lg btn-outline-success" 
                            value="Skicka beställningen">
                </form>
                
            <!-- col avslutas efter en alert -->

        HTML;

        echo $html;
    }

    public function viewConfirmMessage($customer, $lastInsertId)
    {
        $this->printMessage(
            "<h4>Tack $customer[name]</h4>
            <p>Vi kommer att skicka filmen till följande e-post:</p>
            <p>$customer[email]</p>
            <p>Ditt ordernummer är $lastInsertId </p>
            ",
            "success"
        );
    }

    public function viewErrorMessage($customer_id)
    {
        $this->printMessage(
            "<h4>Kundnummer $customer_id finns ej i vårt kundregister!</h4>
                <h5>Kontakta kundtjänst</h5>
                ",
            "warning"
        );
    }

    /**
     * En funktion som skriver ut ett felmeddelande
     * $messageType enligt Bootstrap Alerts
     * https://getbootstrap.com/docs/5.0/components/alerts/
     */
    public function printMessage($message, $messageType = "danger")
    {
        $html = <<< HTML

            <div class="my-2 alert alert-$messageType">
                $message
            </div>
            </div> <!-- col  avslutar Beställningsformulär -->

        HTML;

        echo $html;
    }
}
