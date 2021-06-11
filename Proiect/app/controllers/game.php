<?php

  class Game extends Controller 
  {
    public function __construct()
    {
	  }

    public function index() {
      $this->view('game');
	  }
}