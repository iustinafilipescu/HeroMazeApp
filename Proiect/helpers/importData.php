<?php
include_once '../config/database.php';

$datab= new DB();

$db =  $datab->getConnection();

if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // daca e fisier csv
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // daca e uploadat
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // deschid csv ca read only
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // skip pt linia cu numele coloanelor
            fgetcsv($csvFile);
            
            // iau fiecare linie din csv
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $id=$line[0];
                $first_name  = $line[1];
                $last_name  = $line[2];
                $username  = $line[3];
                $password = $line[4];
                $level= $line[5];
                $points= $line[6];
                $wins= $line[7];
                $lost= $line[8];
                $question_id= $line[9];
                $picture= $line[10];
                $game_question_id= $line[11];
                $isAdmin= $line[12];


                
       
                
            
       
                        $db->query( "INSERT INTO users (id,first_name, last_name, username, password, level, points, wins, lost,question_id,picture,game_question_id,isAdmin)
                      VALUES 
                      ('$id','$first_name','$last_name','$username','$password','$level','$points','$wins','$lost','$question_id','$picture','$game_question_id','$isAdmin')");
                
            }
            
            // inchidem
            fclose($csvFile);
            
            
        }
    }
    header('Location: http://localhost/Proiect/public/admin');
    }