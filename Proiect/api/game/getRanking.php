<?php
//returneaza ranking-ul cu top 5 useri in functie de numarul de wins pe pagina de Home
//utilizare: http://localhost/Proiect/api/game/getRanking.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");

include_once '../../config/database.php';
include_once '../../app/models/User.php';

$user = new User();
$users = $user->getTopFiveUsers();
echo json_encode(array("user1" => $users[0], "user2" => $users[1], "user3" => $users[2], "user4" => $users[3], "user5" => $users[4]));
