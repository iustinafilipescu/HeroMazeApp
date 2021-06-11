<?php

///http://localhost/Proiect/public/rssfeed

$connect = new PDO("mysql:host=localhost;dbname=heromaze", "root", "");

$query = "SELECT username, wins FROM users ORDER BY wins DESC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

header("Content-Type: text/xml;charset=iso-8859-1");

$base_url = "http://localhost/Proiect/public/rssfeed";

echo "<?xml version='1.0' encoding='UTF-8' ?>"  ;
echo "<rss version='2.0'>" ;
echo "<channel>" ;
echo "<title> HeroMaze Users Ranking | RSS</title>" ;
echo "<link>".$base_url."index.php</link>" ;
echo "<description>The ranking of the users of the HeroMaze web application for the game. The ranking has as ordering criterion the number of wins in descending order.</description>" ;
echo "<language>en-us</language>" ;

foreach($result as $row)
{
 
 echo "<item >" ;
 echo "<title>".$row["username"]."</title>" ;
 echo "<description>".$row["wins"]."</description>" ;
 echo "</item>" ;
}

echo '</channel>' ;
echo '</rss>' ;




?>
