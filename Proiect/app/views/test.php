<?php
    if(isset($_POST['heroId']))
    {
      session_start();
      $_SESSION['heroId'] = $_POST['heroId'];
    }
?>