<?php
include_once '../api/apiCall.php';

include_once '../helpers/ProfileHelper.php';



session_start();

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


$user = $_SESSION['usern'];
$firstname = getFirstName($user);

$lastname = getLastName($user);

$img = profile($user);

if ($img == 0) {
    $poza = "0.jpg";
} else {
    $poza = $img;
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
    <link rel="stylesheet" href="../public/css/profile.css">
    <title>Profile | Hero Maze</title>
</head>

<body>
    <div class="grid-container">
        <div class="Meniu">
            <a href="home" style="text-decoration:none"><img src="../public/css/media/logo.png" class="logo" alt=""></a>
            <a href="profile" style="text-decoration:none"> <button class="button">Profile</button></a>
            <a href="training" style="text-decoration:none"> <button class="button">Training</button> </a>
            <a href="instruction" style="text-decoration:none"> <button class="button">Instructions</button></a>
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
        <div class="parent-box">
            <div class="profile-checkbox">
                <form method="post" enctype="multipart/form-data">
                    <div class="profile-image">


                        <image src="../public/css/images/<?php echo $poza; ?>" onClick="triggerClick()" id="profileDisplay" />
                        <input id="profileImage" type="file" onClick="triggerClick()" name="profileImage" onChange="displayImage(this)">
                        <label type="submit" name="save_profile" id="uploadButton" onClick="triggerClick()">Choose a profile picture</label>


                        <script>
                            function triggerClick(e) {
                                document.querySelector('#profileImage').click();
                            }

                            function displayImage(e) {
                                if (e.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
                                    }
                                    reader.readAsDataURL(e.files[0]);
                                }
                            }

                            const imgClass = document.querySelector('.profile-image');
                            imgClass.addEventListener('mouseenter', function() {
                                uploadButton.style.display = "block";
                            });
                        </script>



                    </div>

                    <div class="">
                        <button type="submit" id="save" name="save_profile" onclick="<?php echo changepicture($user); ?>">Save Profile Picture</button>
                    </div>
                </form>



                <div class="games-box">
                    <p class="myrank-elements">Level: <?php echo $level; ?></p>
                    <p class="myrank-elements">Wins:<?php echo $wins; ?></p>
                    <p class="myrank-elements">Lost: <?php echo $lost; ?></p>
                </div>
            </div>
        </div>
        <div class="center">
            <div class="wrap">
                <input id="tab-1" type="radio" name="tab" class="user-info" checked><label for="tab-1" class="tab">User Info</label>
                <input id="tab-2" type="radio" name="tab" class="change-password"><label for="tab-2" class="tab">Change password</label>
                <div class="boxes">
                    <div class="user-info-box">
                        <div class="group">



                            <label for="firstName">First name</label><input id="firstName" type="text" class="input" readonly value="<?php echo $firstname; ?>">
                            <label for="firstName">Last name</label><input type="text" class="input" readonly value="<?php echo $lastname; ?>">
                            <label for="firstName">User name</label><input type="text" class="input" readonly value="<?php echo $user; ?>">
                        </div>
                    </div>


                    <div class="profile-box">
                        <div class="group">
                            <form method="POST">
                                <input id="pass" type="password" class="input" name="newpass" data-type="password" placeholder="New password">
                                <input id="pass" type="password" class="input" name="checknewpass" data-type="password" placeholder="Repeat new password">
                                <input type="submit" class="submit-button" value="Submit" onclick="<?php echo change($user); ?>">
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>