<?php
//utilizare: http://localhost/Proiect/api/game/checkAnswer.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");

include_once '../../config/database.php';
include_once '../../app/models/Question.php';

$data = json_decode(file_get_contents("php://input"));
$question_model = new Question();
$message = $question_model->checkAnswer($data->question_number, $data->answer);

echo json_encode(array("message" => $message));
?>
