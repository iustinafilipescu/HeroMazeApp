<?php
include_once '../config/database.php';
include_once '../app/models/User.php';


function nextq($username)
{
    $user = new User();
    $user->initiateUser($username);
    $user->updateQuestionIdIncrease();
}

function prevq($username)
{
    $user = new User();
    $user->initiateUser($username);
    $user->updateQuestionIdDecrease();
}
