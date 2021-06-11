<?php
include_once '../config/database.php';
include_once '../app/models/User.php';
function change($username){
    $user = new User();
    $user->initiateUser($username);
   $user->changepass();
   
}


function getFirstName($username){
    $user = new User();
    $user->initiateUser($username);
    $firstname = $user->getFirstName();
    return $firstname;
}

function getLastName($username){
    $user = new User();
    $user->initiateUser($username);
    $lastname = $user->getLastName();
    return $lastname;
}

function profile($username){
    $user = new User();
    $user->initiateUser($username);
    $img=$user->checkpicture();
    return $img;
  
   
}


function changepicture($username)
{
    $user = new User();
    $user->initiateUser($username);
    $user->changepic();
    
}
