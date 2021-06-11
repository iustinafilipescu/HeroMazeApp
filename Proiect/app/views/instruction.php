<?php
include_once '../api/apiCall.php';

session_start();

$url = 'http://localhost/Proiect/api/game/getIsAdmin.php?user_name=' . $_SESSION['usern'];
$make_call = ApiCall('GET', $url, json_encode($_SESSION['usern']));
$response = json_decode($make_call, true);
$isAdmin = $response['isAdmin'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link rel="icon" type="image/png" sizes="32x32" href="../public/css/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../public/css/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../public/css/icon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="../public/css/instruction.css">
    <meta charset="utf-8">
    <title>Instructions | Hero Maze</title>
</head>

<body>
    <div class="grid-container">
        <div class="Meniu">
            <a href="home" style="text-decoration:none"><img src="../public/css/media/logo.png" class="logo" alt=""></a>
            <a href="Profile" style="text-decoration:none"> <button class="button">Profile</button></a>
            <a href="training" style="text-decoration:none"> <button class="button">Training</button> </a>
            <a href="instruction" style=" text-decoration:none"> <button class="button">Instructions</button></a>
            <?php
            if ($isAdmin == 1) { ?>
                <a href="admin" style="text-decoration:none"> <button class="button">Admin page</button> </a>

            <?php } ?>
            <a href="login.php" style="text-decoration:none"> <button class="button">Log out</button> </a>

            <div class="language">
                Language
                <br>
                <img src="../public/css/media/english.png" class="limba">
                <img src="../public/css/media/romania.png" class="limba">
            </div>


        </div>

        <div class="Center">

            <div class="instructiuni">
                <p> Hero Maze is a knowledge game for lovers of Marvel and DC superheroes.
                    This game focuses on your knowledge in all fields, and you will even be tested on how well you know your favorite superheroes.</p>
                <p>As you collect points, you will be able to choose many other superheroes as pawns.</p>
                <p>Each superhero represents a level, so, as you advance in the level, you will be able to choose from several superheroes. Be careful, though! Depending on
                    the level of the chosen character, the questions will also include knowledge about the superheroes from
                    a lower level. Choose it wisely! Only then you will be able to prove how skilled you are.</p>
                <p>Each superhero has the mission to go through the map and reach the target, but he will be able to succeed only if you answer the questions correctly.</p>
                <p>In order to be able to train before starting a mission, you can access the <a class="train-link" href="training.html"> training section </a> which is a learning environment where you will find the questions you may encounter in the game.
                </p>


            </div>







 </body>
 </html>