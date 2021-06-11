<?php
//returneaza nivelul
//utilizare: http://localhost/Proiect/api/game/getLevel.php?user_name=name

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");

include_once '../../config/database.php';
include_once '../../app/models/User.php';

if (isset($_GET['user_name'])) {
    $username = $_GET['user_name'];
    $user = new User();
    $user->initiateUser($username);
    $level = $user->getLevel();
}

http_response_code(200);
echo json_encode(array("level" => $level));
