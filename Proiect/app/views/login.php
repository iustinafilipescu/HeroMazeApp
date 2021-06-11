<?php
$get = (isset($_GET['success'])) ? $_GET['success'] : '';
if ($get == 0) {
   echo  "<script type='text/javascript'>alert('Incorrect username or password.')</script>";
   echo "<script> location.href=' http://localhost/Proiect/public/login'; </script>";
}
if ($get == 1) {
   echo  "<script type='text/javascript'>alert('Failed, try again!')</script>";
   echo "<script> location.href=' http://localhost/Proiect/public/login'; </script>";
}
if ($get == 2) {
   echo  "<script type='text/javascript'>alert('Account created successfully!')</script>";
   echo "<script> location.href=' http://localhost/Proiect/public/login'; </script>";
}


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
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="../public/css/styleLogin.css" rel="stylesheet" type="text/css">
   <title>Login | Hero Maze</title>
</head>

<body>
   <div class="login-wrap">
      <div class="login-html">
         <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign
            In</label>
         <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
         <div class="login-form">
            <div class="sign-in-htm">
               <div class="group">
                  <script type="text/javascript">
                     function testPass() {
                        var username = document.getElementById("user").value;
                        var passwrd = document.getElementById("pass").value;
                        var ajx = new XMLHttpRequest();
                        ajx.onreadystatechange = function() {
                           if (ajx.readyState == 4 && ajx.status == 200) {
                              document.getElementById("message").innerHTML = this.responseText;
                           }
                        };

                        if (username == '' || passwrd == '') {
                           ajx.open("GET", "../helpers/ajaxlogin.txt", true);
                           ajx.send();
                        } else {
                           document.getElementById("log").action = "login/run";
                        }
                     }
                  </script>
                  <form id="log" action="javascript:testPass();" method="POST">
                     <input id="user" type="text" class="input" name="user-login" placeholder="Username">
                     <input id="pass" type="password" class="input" name="pass-login" placeholder="Password">
                     <input id="check" type="checkbox" class="check" checked>
                     <label for="check"><span class="icon"></span>Remember me</label>
                     <input type="submit" id="login" class="button" value="Login" onclick="testPass()">
                     <div id="message" style="color:red;text-align:center;margin-top:20px;"></div>
                  </form>
                  <button class="button" onclick="openForm()">Show game description</button>
                  <div class="form-pop-up" id="myForm">
                     <div class="form-container">
                        <button class="closeButton" onclick="closeForm()">X</button>
                        <p class="instructions">Hero Maze is a knowledge game for lovers of Marvel and DC
                           superheroes.
                           This game focuses on your knowledge in all fields, and you will even be tested on
                           how well you know your favorite superheroes.
                           As you collect points, you will be able to choose many other superheroes as pawns.
                           Each superhero represents a level, so, as you advance in the level, you will be able
                           to choose from several superheroes. Be careful, though! Depending on
                           the level of the chosen character, the questions will also include knowledge about
                           the superheroes from
                           a lower level. Choose it wisely! Only then you will be able to prove how skilled you
                           are.
                           Each superhero has the mission to go through the map and reach the target, but he
                           will be able to succeed only if you answer the questions correctly.
                           In order to be able to train before starting a mission, you can access the training
                           section which is a learning environment where you will find the questions you may
                           encounter in the game.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="sign-up-htm">
               <div class="group">
               <script type="text/javascript">
                     function testPassReg() {
                        var username = document.getElementById("userreg").value;
                        var passwrd = document.getElementById("passreg").value;
                        var first = document.getElementById("firstreg").value;
                        var last = document.getElementById("lastreg").value;
                        var conf = document.getElementById("passcreg").value;
                        var ajx = new XMLHttpRequest();
                        ajx.onreadystatechange = function() {
                           if (ajx.readyState == 4 && ajx.status == 200) {
                              document.getElementById("message1").innerHTML = this.responseText;
                           }
                        };

                        if (username == '' || passwrd == '' || first=='' || last=='' || conf=='') {
                           ajx.open("GET", "../helpers/ajaxlogin.txt", true);
                           ajx.send();
                        } else {
                           document.getElementById("reg").action = "login/run";
                        }
                     }
                  </script>
                  <form id="reg" action="javascript:testPassReg();" method="POST">
                     <input id="firstreg" type="text" class="input" name="firstname" placeholder="First name">
                     <input id="lastreg" type="text" class="input" name="lastname" placeholder="Last name">
                     <input id="userreg" type="text" class="input" name="username" placeholder="Username">
                     <input id="passreg" type="password" class="input group" name="password" data-type="password" placeholder="Password">
                     <input id="passcreg" name="confirmpass" type="password" class="input" data-type="password" placeholder="Repeat password">
                     <input type="submit" class="button" value="Sign Up" onclick="testPassReg()">
                     <div id="message1" style="color:red;text-align:center;margin-top:20px;"></div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <a href="documentatie">Documentatie</a>
   <script>
      function openForm() {
         document.getElementById("myForm").style.display = "block";
      }

      function closeForm() {
         document.getElementById("myForm").style.display = "none";
      }
   </script>
   <script>
      document.addEventListener("keyup", function(event) {
         if (event.keyCode === 13) {
            document.getElementById("login").click();
         }
      });
   </script>
</body>

</html>