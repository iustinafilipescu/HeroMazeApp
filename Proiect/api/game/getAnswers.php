<?php
//returneaza raspunsurile la intrebarea curenta din joc
//utilizare: http://localhost/Proiect/api/game/getAnswers.php?question_number=number

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
    $A_answer = $question_model->getAAnswer($question_number);
    $B_answer = $question_model->getBAnswer($question_number);
    $C_answer = $question_model->getCAnswer($question_number);

    $response['A_answer'] = $A_answer;
    $response['B_answer'] = $B_answer;
    $response['C_answer'] = $C_answer;
    http_response_code(200);
    echo json_encode($response);
}
?>
