<?php

class GameSession
{
  private $connection;

  public $hero_id;
  public $lives;

  public function __construct()
  {
    $database = new DB();
    $this->connection = $database->getConnection();
    session_start();
  }

  public function start()
  {
  }

  public function setPoints()
  {
    $sqlQuery = "UPDATE users SET points = 0 WHERE username = ?";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->bindParam(1, $_SESSION['usern']);
  
    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  public function setLives()
  {
    $_SESSION['lives'] = 3;
    $this->lives = 3;
  }
}
