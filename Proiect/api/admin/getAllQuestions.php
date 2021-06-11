<?php
//returneaza nivelul
//utilizare: http://localhost/Proiect/api/admin/getAllQuestions.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");

include_once '../../config/database.php';
include_once '../../app/models/Question.php';

$question = new Question();
$questions = $question->getAllQuestions();

echo json_encode($questions);
