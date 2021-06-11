<?php
include_once '../api/apiCall.php';
include_once '../helpers/getHeroImage.php';
include_once '../helpers/updateQ.php';

session_start();

$url = 'http://localhost/Proiect/api/game/getIsAdmin.php?user_name=' . $_SESSION['usern'];
$make_call = ApiCall('GET', $url, json_encode($_SESSION['usern']));
$response = json_decode($make_call, true);
$isAdmin = $response['isAdmin'];

//get question id of the current user
$url = 'http://localhost/Proiect/api/training/getQuestionId.php?user_name=' . $_SESSION['usern'];
$make_call = ApiCall('GET', $url, json_encode($_SESSION['usern']));
$response = json_decode($make_call, true);
$question_id = $response['question_id'];

//get the current question
$url = 'http://localhost/Proiect/api/training/getQuestion.php?user_name=' . $_SESSION['usern'];
$make_call = ApiCall('GET', $url, json_encode($_SESSION['usern']));
$response = json_decode($make_call, true);
$question = $response['question'];

//get the answers
$url = 'http://localhost/Proiect/api/training/getAnswers.php?user_name=' . $_SESSION['usern'];
$make_call = ApiCall('GET', $url, json_encode($_SESSION['usern']));
$response = json_decode($make_call, true);
$A_answer        = $response['A_answer'];
$B_answer        = $response['B_answer'];
$C_answer        = $response['C_answer'];
$correct_answer  = $response['C_answer'];

$user = $_SESSION['usern'];


if (isset($_POST['left'])) {

    prevq($user);
    header('Location: http://localhost/Proiect/public/training');
}

if (isset($_POST['right'])) {
    nextq($user);
    header('Location: http://localhost/Proiect/public/training');
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
    <title>Training | Hero Maze</title>

    <link rel="stylesheet" href="../public/css/training.css">
</head>

<body>

    <div class="grid-containerPage">
        <div class="Meniu">
            <a href="home " style="text-decoration:none">
                <img src="../public/css/media/logo.png" class="logo" alt=""></a>
            <a href="profile" style="text-decoration:none"> <button class="button">Profile</button></a>
            <br>
            <a href="training" style="text-decoration:none"> <button class="button">Training</button> </a>
            <br>
            <a class="instruction" href="Instruction" style="text-decoration:none"> <button class="button">Instructions</button></a>
            <br>
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


            <div class="grid-containerCenter">
                <div class="question"> #<?php echo $question_id;
                                        echo " ";
                                        echo $question; ?> </div>
                <button class="A" onclick="checkAnswer(this,' <?php echo $A_answer; ?>')"> <?php echo $A_answer; ?> </button>
                <button class="B" onclick="checkAnswer(this,'<?php echo $B_answer; ?>')"> <?php echo $B_answer; ?> </button>
                <button class="C" onclick="checkAnswer(this,'<?php echo $C_answer; ?>')"> <?php echo $C_answer; ?> </button>

                <form method="POST" class="leftarrow">
                    <input class="left" type="submit" name="left" value="Previous">
                </form>

                <form method="POST" class="rightarrow">
                    <input class="right" type="submit" name="right" value="Next">
                </form>



            </div>

        </div>
    </div>

    <script>
        function checkAnswer(el, answer) {
            var correct = "<?php echo $correct_answer; ?>";
            if (answer.localeCompare(correct.toString()) == 0) {
                el.style.backgroundColor = "green";

            } else
                el.style.backgroundColor = "red";
        }
    </script>

</body>

</html>