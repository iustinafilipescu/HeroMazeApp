<?php
//returneaza numarul de points din sesiunea curenta de joc
//utilizare: http://localhost/Proiect/api/game/getPoints.php?user_name=name

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");

include_once '../../config/database.php';
include_once '../../app/models/User.php';

if(isset($_GET['user_name']))
{
    $username = $_GET['user_name'];
    $user = new User();
    $user->initiateUser($username);
    $points = $user->getPoints();
}

http_response_code(200);
echo json_encode(array("points" => $points));
?>
