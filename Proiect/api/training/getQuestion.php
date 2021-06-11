<?php
//returneaza intrebarea curenta din sesiunea curenta de joc
//utilizare: http://localhost/Proiect/api/training/getQuestion.php

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
    $question = $question_model->getQuestion($question_id);
    http_response_code(200);
    echo json_encode(array("question" => $question));
}
