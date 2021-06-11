<?php
//returneaza intrebarea curenta din sesiunea curenta de joc
//utilizare: http://localhost/Proiect/api/game/getQuestion.php?question_number=number

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");

include_once '../../config/database.php';
include_once '../../app/models/Question.php';

if(isset($_GET['question_number']))
{
    $question_number = $_GET['question_number'];
    $question_model = new Question();
    $question = $question_model->getQuestion($question_number);
    http_response_code(200);
    echo json_encode(array("question" => $question));
}
?>
