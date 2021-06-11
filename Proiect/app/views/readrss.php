<?php

//http://localhost/Proiect/public/readrss

$feed_url = "http://localhost/Proiect/public/rssfeed/index.php";

$object = new DOMDocument();

$object->load($feed_url);

$content = $object->getElementsByTagName("item");


?>

<!DOCTYPE html>
<html>
 <head>
  <title>HeroMaze Ranking RSS</title>
  
 </head>
 <body>
  <div >
   <br />
   <h2 style="text-align:center;">HeroMaze Users Ranking RSS Reader</h2>
   <br />
   <?php
    
   foreach($content as $row)
   {
    echo '<h3>' . $row->getElementsByTagName("title")->item(0)->nodeValue . '</h3>';
    echo '<hr />';
    echo '
   
      <p>Wins:</p>
      <p>'.$row->getElementsByTagName("description")->item(0)->nodeValue.'</p>

    ';
    echo '<br />';

  
    
   }

   ?>
  </div>
 </body>
</html>

