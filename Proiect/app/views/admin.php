<?php
include_once '../api/apiCall.php';
include_once '../helpers/getUserInfAdmin.php';

session_start();

$url = 'http://localhost/Proiect/api/game/getUsers.php';
$make_call = ApiCall('GET', $url);
$users = json_decode($make_call, true);

$url = 'http://localhost/Proiect/api/admin/getAllQuestions.php';
$make_call = ApiCall('GET', $url);
$questions = json_decode($make_call, true);



$num = 0;
foreach ($questions as $p) {

    $prod[$num]['question']       = $p[0];
    $prod[$num]['A_answer']       = $p[1];
    $prod[$num]['B_answer']       = $p[2];
    $prod[$num]['C_answer']       = $p[3];
    $prod[$num]['correct_answer'] = $p[4];
    $num = $num + 1;
}

$fp = fopen('../public/css/exportFiles/questions.csv', 'w');
foreach ($prod as $fields) {
    fputcsv($fp, $fields);
}
fclose($fp);

$url = 'http://localhost/Proiect/api/game/getIsAdmin.php?user_name=' . $_SESSION['usern'];
$make_call = ApiCall('GET', $url, json_encode($_SESSION['usern']));
$response = json_decode($make_call, true);
$isAdmin = $response['isAdmin'];



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST['deleteBtn'] as $key => $value) {
        $user = $key;
    }

    $data = array("user_name" => $user);
    $url =  'http://localhost/Proiect/api/admin/deleteUser.php';

    $make_call = ApiCall('POST', $url, json_encode($data));

    $url = 'Location: http://localhost/Proiect/public/admin';
    header($url);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link rel="icon" type="image/png" sizes="32x32" href="../public/css/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../public/css/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../public/css/icon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="../public/css/admin2.css">
    <meta charset="utf-8">
    <title>Admin Module | Hero Maze</title>
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
                <img src="../public/css/media/english.png" class="limba">
                <img src="../public/css/media/romania.png" class="limba">
            </div>


        </div>
        <form class="users" method="POST" action="admin">
            <div style="height:300px;overflow:auto;">
                <table style="width:100% " id="table">
                    <tr>
                        <th>Username</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Action</th>
                    </tr>
                    <script>
                        var users = JSON.parse('<?php echo json_encode($users) ?>');

                        function generateTable(table, data) {
                            for (let user of data) {
                                let row = table.insertRow();
                                for (index of user) {
                                    let cell = row.insertCell();
                                    let text = document.createTextNode(index);
                                    cell.appendChild(text);
                                }

                                let cell = row.insertCell();
                                let deleteBtn = document.createElement("input");
                                deleteBtn.setAttribute("type", "submit");
                                var name = "deleteBtn[" + user[0] + "]";
                                deleteBtn.setAttribute("name", name);
                                deleteBtn.setAttribute("id", user[0]);
                                deleteBtn.setAttribute("class", "deleteBtn");
                                deleteBtn.setAttribute("value", "Delete user");
                                cell.appendChild(deleteBtn);
                            }
                        }

                        let table = document.querySelector("table");
                        generateTable(table, users);
                    </script>
                </table>
            </div>


        </form>
        <form class="questions" method="POST" action="admin">
            <div style="height:300px;overflow:auto;">
                <table style="width:100%" id="table2">
                    <a href="../public/css/exportFiles/questions.csv" download="questions.csv">
                        <button class='button' type="button">Download questions as CSV file</button> </a>

                    <a href="../public/css/exportFiles/questions.xml" download="questions.xml">
                        <button class='button' type="button">Download questions as XML file</button> </a>

                                <div class="row">
                    <tr>
                        <th>Question</th>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>correct </th>
                    </tr>
                    <script>
                        var questions = JSON.parse('<?php echo json_encode($questions) ?>');
                        table = document.querySelector('#table2');
                        generateTableQuestions(table, questions);

                        function generateTableQuestions(table, data) {
                            for (let question of data) {
                                let row = table.insertRow();
                                i = 1;
                                for (index of question) {
                                    let cell = row.insertCell();
                                    let text = document.createTextNode(index);
                                    if (i == 1) {
                                        cell.setAttribute("id", "question");
                                        i++;
                                    }
                                    cell.appendChild(text);
                                }
                            }

                        }
                    </script>
                </table>
            </div>


        </form>



       <!-- upload form pt csv -->
       <div class="" id="importFrm"  style="
    grid-area: users;
    margin-top: 310px;
    padding: 3%;
" >
        <form action="../helpers/importData.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" class="" name="importSubmit" value="IMPORT USERS" style="  border-radius: 12px;
  background-color: #008cba;
  border: none;
  text-decoration: none;
  font-size: 17px;
  cursor: pointer;
  color: black;
  opacity: 0.8;
  transition: 0.3s;
  font-family: Arial, Helvetica, sans-serif;
  height: 4vh;
  width: 13%;">
        </form>
    </div>

   </form>








</body>

</html>
