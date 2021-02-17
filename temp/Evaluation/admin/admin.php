<?php

/***************************************************************
 *
 *                   Visa alla utvärderingar 
 *
 ***************************************************************/

require_once 'header.php';

require_once 'db.php';

$stmt = $conn->prepare("SELECT * FROM courses");
$stmt->execute();
$courses = $stmt->fetchAll();

?>


<form action="#" method="GET" class="row">

    <div class="col-md-6">
        <select name="course" class="form-select" required>
            <option value="">-- Välj kurs --</option>
            <?php foreach ($courses as $key => $course) { ?>
                <option value="<?php echo $course['course_id'] ?>"><?php echo $course['name'] ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="col-md-6">
        <input type="submit" class="form-control btn btn-primary" value="Visa alla svar">
    </div>

</form>

<hr>

<?php

if (isset($_GET['course'])) {

    $course_id = htmlspecialchars( $_GET['course'] );

    // Hämta kursen från databasen
    $stmt = $conn->prepare("SELECT * FROM courses WHERE course_id = :course_id");
    $stmt->bindParam(':course_id', $course_id);
    $stmt->execute();
    $course = $stmt->fetch();
    echo "<h2 class='mt-3'>Kurs: $course[name]</h2>";

    // Hämta alla frågor
    $stmt = $conn->prepare("SELECT * FROM questions");
    $stmt->execute();
    $questions = $stmt->fetchAll();

    // Visa svar på alla frågor (en i taget)
    foreach ($questions as $key => $question) {
        $question_id = $question['question_id'];
        echo "<h4>$question_id. $question[question]</h4>";

        // Hämta alla svar
        $stmt = $conn->prepare("SELECT * FROM courses, surveys, answers, students
                                WHERE answers.survey_id = surveys.survey_id
                                AND courses.course_id = surveys.course
                                AND students.student_id = surveys.student
                                AND answers.question_id = :question_id
                                AND courses.course_id = :course_id");
        $stmt->bindParam(':question_id', $question_id);
        $stmt->bindParam(':course_id', $course_id);
        $stmt->execute();
        $answers = $stmt->fetchAll();

        echo "
        <table class='table table-hover'>";
        foreach ($answers as $key => $answer) {
            //print_r($answer);
            echo "
            <tr>
                <td width='200'>$answer[name]</td>
                <td>$answer[answer]</td>
            </tr>
            ";
        }
        echo "</table>
        ";
    }
}
require_once 'footer.php';
