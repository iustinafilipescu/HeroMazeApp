<?php

class User
{
  public $id;
  public $username;
  public $password;
  public $points;
  public $wins;
  public $lost;
  public $question_id;
  public $picture;

  private $connection = null;

  public function __construct()
  {
    $database = new DB();
    $this->connection = $database->getConnection();
  }

  public function initiateUser($username)
  {
    $this->username = $username;
  }

  public function login()
  {
    if (isset($_POST['user-login']) && isset($_POST['pass-login'])) //verific daca se logheaza
    {
      $this->username = $_POST['user-login'];
      $this->password = $_POST['pass-login'];

      $sqlQuery = "SELECT * FROM users u WHERE username = ? AND password = ?";
      $stmt = $this->connection->prepare($sqlQuery);
      $stmt->bindParam(1, $this->username);
      $stmt->bindParam(2, $this->password);
      $stmt->execute();
      $count = $stmt->rowCount();

      if ($count == 1) {
        session_start();
        $_SESSION['usern'] = $this->username;

        header('Location: http://localhost/Proiect/public/home');
        return true;
      } else {

        if ($count == 0) {
          header('Location:../views/login.php?success=0');
          return true;
        }
      }
    } else if ($this->register() == true) {
      header('Location:../views/login.php?success=2');
    } else {

      header('Location:../views/login.php?success=1');
    }
  }

  public function register()
  {
    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['password']) && isset( $_POST['confirmpass']))
    {

      $firstName = $_POST['firstname'];
      $lastName = $_POST['lastname'];
      $userName = $_POST['username'];
      $password = $_POST['password'];
      $confirm_pass = $_POST['confirmpass'];
  
      $sqlQuery = "INSERT INTO users (first_name, last_name, username, password, level, points, wins, lost)  
                      VALUES 
                      ('$firstName','$lastName','$userName','$password',1,0,0,0)";
      $stmt = $this->connection->prepare($sqlQuery);
  
      $sql = "SELECT first_name from users where username = '$userName'";
      $stmt1 = $this->connection->prepare($sql);
  
  
      $stmt1->execute();
      $row = $stmt1->fetch(PDO::FETCH_ASSOC);
  
      if ($row == NULL && $password == $confirm_pass) {
  
        $stmt->execute();
        return true;
      } else {
  
        return false;
      }
    }
 
  }

  public function getPoints()
  {
    $sqlQuery = "SELECT points FROM users WHERE username = ?";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->bindParam(1, $this->username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $points = $row['points'];
    return $points;
  }

  public function updatePoints($message)
  {
    $sqlQuery = "UPDATE users SET points = ? WHERE username = ?";
    $stmt = $this->connection->prepare($sqlQuery);

    $points = $this->getPoints();
    if ($message === "Your answer was correct!")
      $points = $points + 1;
    else {
      //daca a raspuns gresit la o intrebare si are 0 puncte, lasam 0 puncte, nu facem -1, -2 etc
      if ($points > 0)
        $points = $points - 1;
    }

    $stmt->bindParam(1, $points);
    $stmt->bindParam(2, $this->username);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  public function getTopFiveUsers()
  {
    $users = [];

    $sqlQuery = "SELECT username FROM users ORDER BY wins DESC LIMIT 0, 1";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    array_push($users, $row['username']);

    $sqlQuery = "SELECT username FROM users ORDER BY wins DESC LIMIT 1, 1";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    array_push($users, $row['username']);

    $sqlQuery = "SELECT username FROM users ORDER BY wins DESC LIMIT 2, 1";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    array_push($users, $row['username']);

    $sqlQuery = "SELECT username FROM users ORDER BY wins DESC LIMIT 3, 1";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    array_push($users, $row['username']);


    $sqlQuery = "SELECT username FROM users ORDER BY wins DESC LIMIT 4, 1";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    array_push($users, $row['username']);


    return $users;
  }


  public function getUsers()
  {
    $users = [];

    $sqlQuery = "SELECT * FROM users";
    $result = $this->connection->prepare($sqlQuery);
    $result->execute();

    if ($result->rowCount() > 0) {
      // output data of each row
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $stack = array($row["username"], $row["first_name"], $row["last_name"]);
        array_push($users, $stack);
      }
    } else {
      echo "0 results";
    }

    return $users;
  }

  public function deleteUser()
  {
    $sqlQuery = "DELETE FROM users WHERE username = ?";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->bindParam(1, $this->username);
    $stmt->execute();
  }


  public function getLevel()
  {
    $sqlQuery = "SELECT level FROM users WHERE username = ?";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->bindParam(1, $this->username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $level = $row['level'];
    return $level;
  }

  public function getIsAdmin()
  {
    $sqlQuery = "SELECT isAdmin FROM users WHERE username = ?";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->bindParam(1, $this->username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $isAdmin = $row['isAdmin'];
    return $isAdmin;
  }

  public function getWins()
  {
    $sqlQuery = "SELECT wins FROM users WHERE username = ?";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->bindParam(1, $this->username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $wins = $row['wins'];
    return $wins;
  }

  public function getLost()
  {
    $sqlQuery = "SELECT lost FROM users WHERE username = ?";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->bindParam(1, $this->username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $lost = $row['lost'];
    return $lost;
  }

  public function getQuestionId()
  {
    $sqlQuery = "SELECT question_id FROM users WHERE username = ?";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->bindParam(1, $this->username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $question_id = $row['question_id'];
    return $question_id;
  }

  public function updateWins()
  {
    $sqlQuery = "UPDATE users SET wins = ? WHERE username = ?";
    $stmt = $this->connection->prepare($sqlQuery);

    $wins = $this->getWins();
    $wins = $wins + 1;
    $stmt->bindParam(1, $wins);
    $stmt->bindParam(2, $this->username);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  public function updateLost()
  {
    $sqlQuery = "UPDATE users SET lost = ? WHERE username = ?";
    $stmt = $this->connection->prepare($sqlQuery);

    $lost = $this->getLost();
    $lost = $lost + 1;
    $stmt->bindParam(1, $lost);
    $stmt->bindParam(2, $this->username);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  public function updateLevel()
  {
    $sqlQuery = "UPDATE users SET level = ? WHERE username = ?";
    $stmt = $this->connection->prepare($sqlQuery);

    $level = $this->getLevel();
    $level = $level + 1;
    $stmt->bindParam(1, $level);
    $stmt->bindParam(2, $this->username);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }
  public function updateQuestionIdIncrease()
  {
    $this->question_id = $this->getQuestionId();
    $this->question_id = $this->question_id + 1;
    $sqlQuery = "UPDATE users SET question_id = '$this->question_id' WHERE username = ?";
    $stmt = $this->connection->prepare($sqlQuery);

    $stmt->bindParam(1, $this->username);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  public function updateQuestionIdDecrease()
  {
    $this->question_id = $this->getQuestionId();
    if ($this->question_id > 1) {
      $this->question_id = $this->question_id - 1;
    }

    $sqlQuery = "UPDATE users SET question_id = '$this->question_id' WHERE username = ?";
    $stmt = $this->connection->prepare($sqlQuery);

    $stmt->bindParam(1, $this->username);

    if ($stmt->execute()) {

      return true;
    }
    return false;
  }

  public function getFirstName()
  {
    $sqlQuery = "SELECT first_name FROM users WHERE username = ?";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->bindParam(1, $this->username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $firstname = $row['first_name'];
    return $firstname;
  }

  public function getLastName()
  {
    $sqlQuery = "SELECT last_name FROM users WHERE username = ?";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->bindParam(1, $this->username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $firstname = $row['last_name'];
    return $firstname;
  }

  public function changepass()
  {

    $newp = $_POST['newpass'];
    $check = $_POST['checknewpass'];

    if ($newp == $check && $newp != null) {
      $this->password = $newp;
      $sql = "UPDATE users SET password='$this->password' WHERE username = ?";
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(1, $this->username);
      if ($stmt->execute()) {
        return true;
      }
    }

    if ($newp != $check && $newp != null) {
      return false;
    }
  }

  public function checkpicture()
  {
    $sql1 = "SELECT picture FROM users WHERE username=? ";
    $stmt = $this->connection->prepare($sql1);
    $stmt->bindParam(1, $this->username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $img = $row['picture'];

    return $img;
  }

  public function changepic()
  {
    if (isset($_POST['save_profile'])) {

      $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];

      $target_dir = "../public/css/images/";
      $target_file = $target_dir . basename($profileImageName);

      echo $profileImageName;
      if (empty($error)) {
        if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {

          $sql = "UPDATE users SET picture='$profileImageName' WHERE  username=? ";

          $stmt = $this->connection->prepare($sql);
          $stmt->bindParam(1, $this->username);
          $stmt->execute();
        }
      }
      header('Location: http://localhost/Proiect/public/profile');
    }
  }

  
}
