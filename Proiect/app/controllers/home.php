<?php
  include_once '../app/models/GameSession.php';

  class Home extends Controller 
  {
    public $gameSession;
    public function __construct()
    {
	 	}

    public function index() {
      $this->view('home');
	  }

    public function startGame() 
    {
      $this->gameSession = new GameSession();
      $this->gameSession->setPoints(); //la fiecare sesiune noua de joc punctele vor fi initializate cu 0
      $this->gameSession->setLives(); //la fiecare sesiune noua de joc vietile vor fi initializate cu 3
      header('Location: http://localhost/Proiect/public/game?question=1');
    }
  
}