<?php
//actualizeaza numarul de puncte din baza de date
//utilizare: http://localhost/Proiect/api/training/updateQuestionIdIncrease.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");

include_once '../../config/database.php';
include_once '../../app/models/User.php';
echo 'aici';
$data = json_decode(file_get_contents("php://input"));
$user = new User();
$user->initiateUser($data->user_id);
$user->updateQuestionIdIncrease($data->message);
