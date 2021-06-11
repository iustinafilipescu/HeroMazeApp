<?php
//returneaza numarul de wins
//utilizare: http://localhost/Proiect/api/game/getWins.php?user_name=name

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
    $wins = $user->getWins();
}

http_response_code(200);
echo json_encode(array("wins" => $wins));
?>
