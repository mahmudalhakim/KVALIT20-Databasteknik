<?php

class Controller
{

    private $model;
    private $view;

    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    public function run()
    {
        $this->getHeader();
        $this->getCourses();
        $this->getAnswers();
        $this->getFooter();
    }

    public function getHeader()
    {
        $this->view->viewHeader();
    }

    public function getFooter()
    {
        $this->view->viewFooter();
    }

    public function getCourses()
    {
        $courses = $this->model->fetchCourses();
        $this->view->viewCourses($courses);
    }

    public function getAnswers()
    {

        if (isset($_GET['course'])) {
            $course_id = $this->sanitize($_GET['course']);
            $course = $this->model->fetchCourseById($course_id);
            $this->view->viewCourse($course);

            $questions = $this->model->fetchQuestions();

            foreach ($questions as $key => $question) {

                $question_id = $question['question_id'];
                $answers = $this->model->fetchAnswers($course_id, $question_id);

                $question = $question['question'];
                $this->view->viewAnswers($question, $answers);
            }
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
