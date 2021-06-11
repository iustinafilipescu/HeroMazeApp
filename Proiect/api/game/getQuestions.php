<?php
//returneaza intrebarile pentru eroul din sesiunea curenta de joc
//utilizare: http://localhost/Proiect/api/game/getQuestions.php?hero_id=id

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");

include_once '../../config/database.php';
include_once '../../app/models/Question.php';

if (isset($_GET['hero_id'])) {
    $hero_id = $_GET['hero_id'];
    $question_model = new Question();
    $questions = $question_model->getQuestions($hero_id);
    http_response_code(200);
    echo json_encode($questions);
}
