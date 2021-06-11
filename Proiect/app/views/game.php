<?php
include_once '../api/apiCall.php';
include_once '../helpers/getHeroImage.php';
include_once '../helpers/getMapLevel.php';
session_start();
$hero_id = $_SESSION['heroId'];
$question_number = $_REQUEST["question"];
$_SESSION['questionNr'] = ($hero_id - 1) * 10 + $question_number;
$lives = $_SESSION['lives'];

//daca jucatorul nu mai are vieti sau a rapsuns la toate intrebarile, il redirectionam 
// catre o pagina in care sa se vada rezultatul
if ($lives == 0 || $question_number > 10) {
    $url = 'Location: http://localhost/Proiect/public/result';
    header($url);
}

//get the points 
$url = 'http://localhost/Proiect/api/game/getPoints.php?user_name=' . $_SESSION['usern'];
$make_call = ApiCall('GET', $url, json_encode($_SESSION['usern']));
$response = json_decode($make_call, true);
$points = $response['points'];

//get the level
$url = 'http://localhost/Proiect/api/game/getLevel.php?user_name=' . $_SESSION['usern'];
$make_call = ApiCall('GET', $url, json_encode($_SESSION['usern']));
$response = json_decode($make_call, true);
$level = $response['level'];

//get the current question
$url = 'http://localhost/Proiect/api/game/getQuestion.php?question_number=' . $_SESSION['questionNr'];
$make_call = ApiCall('GET', $url, json_encode($hero_id, $_SESSION['questionNr']));
$response = json_decode($make_call, true);
$question = $response['question'];

//get the answers
$url = 'http://localhost/Proiect/api/game/getAnswers.php?question_number=' . $_SESSION['questionNr'];
$make_call = ApiCall('GET', $url, json_encode($hero_id, $_SESSION['questionNr']));
$response = json_decode($make_call, true);
$A_answer = $response['A_answer'];
$B_answer = $response['B_answer'];
$C_answer = $response['C_answer'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //verifica daca raspunsul dat e corect
    $url = 'http://localhost/Proiect/api/game/checkAnswer.php';
    if (isset($_POST['A_answer']))
        $answer = 'A';
    if (isset($_POST['B_answer']))
        $answer = 'B';
    if (isset($_POST['C_answer']))
        $answer = 'C';
    $data = array(
        "question_number" => $_SESSION['questionNr'],
        "answer" => $answer
    );

    $make_call = ApiCall('POST', $url, json_encode($data));
    $response = json_decode($make_call, true);
    $data = $response['message'];

    //daca mesajul e "Your answer is incorrect" scadem numarul de vieti
    if ($data === "Your answer was incorrect!") {
        $wrongAnswer = "wrongAnswer" . (4 - $_SESSION['lives']);
        $_SESSION[$wrongAnswer] = $question_number;
        $_SESSION['lives'] = $_SESSION['lives'] - 1;
    }

    //update la numarul de points
    $url = 'http://localhost/Proiect/api/game/updatePoints.php';
    $data_array = array(
        "message" => $data,
        "user_id" => $_SESSION['usern']
    );
    $make_call = ApiCall('POST', $url, json_encode($data_array));

    $question_number = $question_number + 1;
    $url = 'Location: http://localhost/Proiect/public/game?question=' . $question_number;
    header($url);
}

$hero_inf = getHeroImageUrl($hero_id);
$src = $hero_inf[0];
$hero_name = $hero_inf[1];
$map=getMapLevel($level);
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
    <link rel="stylesheet" href="../public/css/styleGame.css">
    <title>Game | Hero Maze</title>
</head>

<body>
    <div class="grid-container">
        <div class="div5"> </div>

        <div class="map">
            <img src=<?php echo "$map" ?> class="imgMap" alt="">
        </div>

        <div class="question1">
            <button class="button" onclick="openForm()" id="showQuestion">Show question</button>
        </div>

        <div class="hero">
            <img src=<?php echo "$src" ?> class="heroImg" alt="">
        </div>

        <div class="gameInfo gameInfoGrid">
            <div class="points"> Points: <?php echo $points; ?> </div>
            <div class="lives"> Lives left: <?php echo $lives; ?></div>
            <div class="level">Level: <?php echo $level; ?></div>
            <div class="superhero"> Hero: <?php echo $hero_name; ?> </div>
        </div>

    </div>
    <form method="POST" action="">
        <div class="form-popup" id="myForm">
            <div class="form-container">
                <div class="grid-containerCenter">
                    <div class="question">
                        <?php echo $question; ?>
                    </div>
                    <input type="submit" class="A" name="A_answer" value="<?php echo $A_answer; ?>" />
                    <input type="submit" class="B" name="B_answer" value="<?php echo $B_answer; ?>" />
                    <input type="submit" class="C" name="C_answer" value="<?php echo $C_answer; ?>" />
                    <button type="button" class="closeButton" onclick="closeForm()" id="closeQuestion">X</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        var isSet = "<?php echo $_SESSION['questionNr'] ?>";
        if (isSet % 10 != 1) {
            document.getElementById("myForm").style.display = "block";
        }

        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            console.log("here");
            document.getElementById("myForm").style.display = "none";
        }
    </script>

    <script>
        document.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                document.getElementById("submitAnswer").click();
            }
        });


        document.addEventListener("keyup", function(event) {
            if (event.keyCode === 27) {
                document.getElementById("closeQuestion").click();
            }
        });

        document.addEventListener("keyup", function(event) {
            if (event.keyCode === 32) {
                document.getElementById("showQuestion").click();
            }
        });
    </script>
</body>

</html>