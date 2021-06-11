<?php
//returneaza raspunsurile la intrebarea curenta a userului
//utilizare: http://localhost/Proiect/api/training/getAnswers.php?question_number=number

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");

include_once '../../config/database.php';
include_once '../../app/models/Question.php';
include_once '../../app/models/User.php';

if (isset($_GET['user_name'])) {

    $username = $_GET['user_name'];
    $user = new User();
    $user->initiateUser($username);
    $question_id = $user->getQuestionId();

    $question_model = new Question();
    $A_answer = $question_model->getAAnswer($question_id);
    $B_answer = $question_model->getBAnswer($question_id);
    $C_answer = $question_model->getCAnswer($question_id);
    $correct_answer = $question_model->getCorrectAnswer($question_id);

    $response['A_answer'] = $A_answer;
    $response['B_answer'] = $B_answer;
    $response['C_answer'] = $C_answer;
    $response['Correct_answer'] = $C_answer;

    http_response_code(200);
    echo json_encode($response);
}
