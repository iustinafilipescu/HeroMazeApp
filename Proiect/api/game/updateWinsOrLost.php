<?php
//utilizare: 

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");

include_once '../../config/database.php';
include_once '../../app/models/User.php';

$data = json_decode(file_get_contents("php://input"));
$user = new User();
$user->initiateUser($data->user_name);

if($data->response === "wins")
{
    $user->updateWins();
    echo json_encode(array("wins" => $user->getWins()));
}
else
{
    $user->updateLost();
    echo json_encode(array("lost" => $user->getLost()));
}
?>
