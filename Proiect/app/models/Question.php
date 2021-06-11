<?php
class Question
{
  public $id;
  public $hero_id;
  public $question;
  public $A_answer;
  public $B_answer;
  public $C_answer;
  public $correct_answer;

  private $connection = null;

  public function __construct()
  {
    $database = new DB();
    $this->connection = $database->getConnection();
  }

  public function getQuestion($id)
  {
    $sqlQuery = "SELECT question FROM questions WHERE id = ?";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $question = $row['question'];
    return $question;
  }

  public function getAAnswer($id)
  {
    $sqlQuery = "SELECT A_answer FROM questions WHERE id = ?";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $answer = $row['A_answer'];
    return $answer;
  }

  public function getBAnswer($id)
  {
    $sqlQuery = "SELECT B_answer FROM questions WHERE id = ?";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $answer = $row['B_answer'];
    return $answer;
  }

  public function getCAnswer($id)
  {
    $sqlQuery = "SELECT C_answer FROM questions WHERE id = ?";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $answer = $row['C_answer'];
    return $answer;
  }

  public function getCorrectAnswer($id)
  {
    $sqlQuery = "SELECT correct_answer FROM questions WHERE id = ?";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $answer = $row['correct_answer'];
    return $answer;
  }

  public function checkAnswer($id, $answer)
  {
    $sqlQuery = "SELECT correct_answer FROM questions WHERE id = ?";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $correct_answer = $row['correct_answer'];
    if ($correct_answer === $answer)
      return "Your answer was correct!";
    return "Your answer was incorrect!";
  }

  public function getQuestions($hero_id)
  {
    $sqlQuery = "SELECT question FROM questions WHERE character_id = ?";
    $stmt = $this->connection->prepare($sqlQuery);
    $stmt->bindParam(1, $hero_id);
    $stmt->execute();

    $questions = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
      array_push($questions, $row["question"]);

    return $questions;
  }


  public function getAllQuestions()
  {
    $questions = [];

    $sqlQuery = "SELECT * FROM questions";
    $result = $this->connection->prepare($sqlQuery);
    $result->execute();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $stack = array($row["question"], $row["A_answer"], $row["B_answer"], $row["C_answer"], $row["correct_answer"]);
      array_push($questions, $stack);
    }

    return $questions;
  }
}
