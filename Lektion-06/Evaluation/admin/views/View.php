<?php

// Viktigt att läsa om PHP Templating och HEREDOC syntax!
// https://css-tricks.com/php-templating-in-just-php/

class View
{

    public function viewHeader()
    {
        $html = <<<HTML
            <!doctype html>
            <html lang="sv">
            <head>
            <meta charset="utf-8">
            <title>Kursutvärdering</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="styles/bootstrap.css">
            <link rel="stylesheet" href="styles/styles.css">
            </head>
            <body class="container">
            <h1 class="text-center">
            <a href="../index.php">Kursutvärdering</a>
            </h1>


        HTML;
        echo $html;
    }

    public function viewFooter()
    {
        $date = date('Y');

        $html = <<<HTML

            <footer>
            
            <p class="text-center text-muted">Copyright &copy; $date</p>
            </footer>
            </body>
            </html>

        HTML;
        echo $html;
    }

    public function viewCourse($course)
    {
        if($course)
            echo "<h2 class='text-info'>Kurs: $course[name]</h2>";
    }


    public function viewCourses($courses)
    {
        $html = <<<HTML

            <form action="#" method="GET" class="row">

            <div class="col-md-6">
                <select name="course" class="form-control mb-3" required>
                    <option value="">-- Välj kurs --</option>
        HTML;

        foreach ($courses as $key => $course) {
            $html .= "<option value='$course[course_id]'>$course[name]</option>";
        }

        $html .= <<<HTML

                </select>
            </div>

            <div class="col-md-6">
                <input type="submit" class="form-control btn btn-outline-primary mb-3" value="Visa alla svar">
            </div>

            </form>

            <hr>

        HTML;
        echo $html;
    }

    public function viewAnswers($question, $answers)
    {
        if(!$answers) return;
        
        $html = "
            <h4>$question</h4>
            <table class='table table-hover'>
            ";

        foreach ($answers as $key => $answer) {

            $student = empty($answer['name']) ? "<i>Anonym Student</i>" : $answer['name'];

            $html .= "
            <tr>
                <td width='200'>$student</td>
                <td>$answer[answer]</td>
            </tr>
            ";
        }

        $html .= "</table>";

        echo $html;
    }

}
