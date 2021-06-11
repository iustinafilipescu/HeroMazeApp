<?php
//returneaza ranking-ul cu top 5 useri in functie de numarul de wins pe pagina de Home
//utilizare: http://localhost/Proiect/api/game/getUsers.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");

include_once '../../config/database.php';
include_once '../../app/models/User.php';

$user = new User();
$users = $user->getUsers();

echo json_encode($users);
