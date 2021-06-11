<?php
include_once '../api/apiCall.php';

session_start();
$lives = $_SESSION['lives'];

$url = 'http://localhost/Proiect/api/game/getPoints.php?user_name=' . $_SESSION['usern'];
$make_call = ApiCall('GET', $url, json_encode($_SESSION['usern']));
$response = json_decode($make_call, true);
$points = $response['points'];

// echo $_SESSION['wrongAnswer1'] . ' ' .  $_SESSION['wrongAnswer2']  . ' ' .  $_SESSION['wrongAnswer3'];

$url = 'http://localhost/Proiect/api/game/getQuestions.php?hero_id=' . $_SESSION['heroId'];
$make_call = ApiCall('GET', $url, json_encode($_SESSION['heroId']));
$questions = json_decode($make_call, true);

$wrong1 = 0;
$wrong2 = 0;
$wrong3 = 0;


if ($lives == 0) // a pierdut jocul
{
  $message = "You lost the game";
  $data = array(
    "user_name" => $_SESSION['usern'],
    "response" => "lost"
  );
  $wrong1 = $_SESSION['wrongAnswer1'];
  $wrong2 = $_SESSION['wrongAnswer2'];
  $wrong3 = $_SESSION['wrongAnswer3'];
} else {
  if ($lives == 1) {
    $wrong1 = $_SESSION['wrongAnswer1'];
    $wrong2 = $_SESSION['wrongAnswer2'];
  } else if ($lives == 2)
    $wrong1 = $_SESSION['wrongAnswer1'];

  $message = "Congrats! Your score is " . $points . ".";
  $data = array(
    "user_name" => $_SESSION['usern'],
    "response" => "wins"
  );
}

$url = 'http://localhost/Proiect/api/game/updateWinsOrLost.php';
$make_call = ApiCall('POST', $url, json_encode($data));
$response = json_decode($make_call, true);
if (isset($response['wins']) != null) {
  $wins = $response['wins'];
  if ($wins % 2 == 0) //crestem nivelul cu 1
  {
    $url = 'http://localhost/Proiect/api/game/updateLevel.php';
    $data = array("user_name" => $_SESSION['usern']);
    $make_call = ApiCall('POST', $url, json_encode($data));
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="icon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
  <link rel="manifest" href="/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../public/css/styleResult.css">
  <title>Result | Hero Maze</title>
</head>

<body>
  <div class="grid-container">
    <div class="container">
      <div class="message">
        <?php echo $message; ?>
      </div>
      <table class="questions" id="questions">
        <script>
          var questions = JSON.parse('<?php echo json_encode($questions) ?>');
          let table = document.querySelector("table");
          let lives = <?php echo $lives; ?>;
          if (lives == 0) {
            let lastQuestion = <?php echo $wrong3; ?>;
            generateResult(table, questions, lastQuestion);
          } else
            generateResult(table, questions);

          function generateResult(table, questions, index = 10) {
            for (i = 1; i <= index; i++) {
              let row = table.insertRow();
              let cell = row.insertCell();
              cell.setAttribute("id", "text");
              let text = document.createTextNode(i + ". " + questions[i - 1]);
              cell.appendChild(text);
            }
            const rows = document.getElementsByTagName('tr');

            let j = 1;
            let wrong1 = <?php echo $wrong1; ?>;
            let wrong2 = <?php echo $wrong2; ?>;
            let wrong3 = <?php echo $wrong3; ?>;

            for (let row of rows) {
              if (j == wrong1 || j == wrong2 || j == wrong3)
                row.style.color = 'red';
              else
                row.style.color = 'green';
              j++;
            }
          }
        </script>
      </table>
      <form method="POST" action="home">
        <input type="submit" class="backBtn" value="GO BACK HOME" />
      </form>
    </div>
    <div>
</body>

</html>