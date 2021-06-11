<?php
include_once '../api/apiCall.php';
session_start();
//get the ranking
$url = 'http://localhost/Proiect/api/game/getRanking.php';
$make_call = ApiCall('GET', $url);
$response = json_decode($make_call, true);
$user_1 = $response['user1'];
$user_2 = $response['user2'];
$user_3 = $response['user3'];
$user_4 = $response['user4'];
$user_5 = $response['user5'];



//get isAdmin
$url = 'http://localhost/Proiect/api/game/getIsAdmin.php?user_name=' . $_SESSION['usern'];
$make_call = ApiCall('GET', $url, json_encode($_SESSION['usern']));
$response = json_decode($make_call, true);
$isAdmin = $response['isAdmin'];

//get the level
$url = 'http://localhost/Proiect/api/game/getLevel.php?user_name=' . $_SESSION['usern'];
$make_call = ApiCall('GET', $url, json_encode($_SESSION['usern']));
$response = json_decode($make_call, true);
$level = $response['level'];


//get wins
$url = 'http://localhost/Proiect/api/game/getWins.php?user_name=' . $_SESSION['usern'];
$make_call = ApiCall('GET', $url, json_encode($_SESSION['usern']));
$response = json_decode($make_call, true);
$wins = $response['wins'];

//get lost
$url = 'http://localhost/Proiect/api/game/getLost.php?user_name=' . $_SESSION['usern'];
$make_call = ApiCall('GET', $url, json_encode($_SESSION['usern']));
$response = json_decode($make_call, true);
$lost = $response['lost'];

//get isAdmin
$url = 'http://localhost/Proiect/api/game/getIsAdmin.php?user_name=' . $_SESSION['usern'];
$make_call = ApiCall('GET', $url, json_encode($_SESSION['usern']));
$response = json_decode($make_call, true);
$isAdmin = $response['isAdmin'];

?>

<!DOCTYPE html>
<html>

<head>
   <link rel="icon" type="image/png" sizes="32x32" href="../public/css/icon/favicon-32x32.png">
   <link rel="icon" type="image/png" sizes="96x96" href="../public/css/icon/favicon-96x96.png">
   <link rel="icon" type="image/png" sizes="16x16" href="../public/css/icon/favicon-16x16.png">
   <link rel="manifest" href="/manifest.json">
   <meta name="msapplication-TileColor" content="#ffffff">
   <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
   <meta name="theme-color" content="#ffffff">
   <link rel="stylesheet" href="../public/css/home.css">
   <title>Hero Maze</title>
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
            <img src="../public/css/media/english.png" class="lang">
            <img src="../public/css/media/romania.png" class="lang">
         </div>
      </div>
      <div class="Center">
         <div class="chooseHero">
            <img class="hero" src="../public/css/media/aquamanDC.png">
            <img class="hero" src="../public/css/media/batmanDC.png">
            <img class="hero" src="../public/css/media/CaptainAmericaMarvel.png">
            <img class="hero" src="../public/css/media/spidermanMarvel.png">
            <img class="hero" src="../public/css/media/supermanDC.png">
            <img class="hero" src="../public/css/media/thorMarvel.png">
            <img class="hero" src="../public/css/media/TimothyDrakeDC.png">
            <img class="hero" src="../public/css/media/wolverineMarvel.png">
            <div class="leftArrow"> <img src="../public/css/media/left-arrow.png" id="left" class="arrow" onclick="plusDivs(-1)" alt=""> </div>
            <div class="rightArrow"> <img src="../public/css/media/right-arrow.png" id="right" class="arrow" onclick="plusDivs(1)" alt=""></div>
            <div id="status"></div>
            <form class="play" action='home/startGame'>
               <input type="submit" id="playbuton" onclick="getCurrentHero()" class="playButton playButton2" value="PLAY" />
            </form>
            <!-- keyboard shortcuts pentru accesibilitate -->
            <script>
               document.addEventListener("keyup", function(event) {
                  if (event.keyCode === 13) {
                     document.getElementById("playbuton").click();
                  }
               });
            </script>
            <script>
               document.addEventListener("keyup", function(event) {
                  if (event.keyCode === 37) {
                     document.getElementById("left").click();
                  }
               });
            </script>
            <script>
               document.addEventListener("keyup", function(event) {
                  if (event.keyCode === 39) {
                     document.getElementById("right").click();
                  }
               });
            </script>
         </div>
      </div>
      <!-- slideshow pentru alegerea supereroului -->
      <script type="text/javascript">
         var slideIndex = 1;
         showDivs(slideIndex);

         function plusDivs(n) {
            showDivs(slideIndex += n);

            var level = <?php echo $level; ?>;
            if (slideIndex > level - 1)
               document.getElementById("right").style.display = "none";
            else
               document.getElementById("right").style.display = "block";
         }

         function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("hero");
            if (n > x.length) {
               slideIndex = 1
            }

            if (n == 1)
               document.getElementById("left").style.display = "none";

            if (n > 1)
               document.getElementById("left").style.display = "block";

            for (i = 0; i < x.length; i++) {
               x[i].style.display = "none";
            }
            x[slideIndex - 1].style.display = "block";
         }

         function getCurrentHero() {
            var param = "heroId=" + slideIndex;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", '../app/views/test.php', true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
               if (xhr.readyState == 4 && xhr.status == 200) {
                  var return_data = xhr.responseText;
                  document.getElementById("status").innerHTML = return_data;
               }
            }
            xhr.send(param);
            // window.location.href('game.php');
         }
      </script>
      <div class="Ranking">
         <div class="boxedtopusers">
            Ranking
            <div class="users">
               <img src="../public/css/media/user.png" class="iconitauser" alt=""> <?php echo $user_1; ?> <br><br>
               <img src="../public/css/media/user.png" class="iconitauser" alt=""> <?php echo $user_2; ?> <br><br>
               <img src="../public/css/media/user.png" class="iconitauser" alt=""> <?php echo $user_3; ?> <br><br>
               <img src="../public/css/media/user.png" class="iconitauser" alt=""> <?php echo $user_4; ?> <br><br>
               <img src="../public/css/media/user.png" class="iconitauser" alt=""> <?php echo $user_5; ?> <br><br>
            </div>
         </div>
         <div>
            <img src="../public/css/media/orange.png" style="width:30px;height:30px;margin-top:5px;margin-left:5px;display:inline-block;vertical-align:middle;">
            <a href="readrss" style="display:inline-block;vertical-align: middle;  color: #82dff4;"> RSS Reader</a>
         </div>

         <div>
            <img src="../public/css/media/blue.png" style="width: 40px;margin-top: 10px;display:inline-block;vertical-align: middle;">
            <a href="rssfeed" style="display:inline-block;vertical-align: middle;  color: #82dff4;"> XML RSS</a>

         </div>

         <div class="myrank" style="margin-top: 0%;">
            <p class="myrank-title">My rank</p>
            <p class="myrank-elements">Level: <?php echo $level; ?></p>
            <p class="myrank-elements">Wins: <?php echo $wins; ?></p>
            <p class="myrank-elements">Lost:<?php echo $lost; ?> </p>
         </div>
      </div>
   </div>
</body>

</html>