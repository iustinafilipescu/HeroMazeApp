<?php

  class Training extends Controller 
  {
    public function __construct()
    {
	  }

    public function index() {
      $this->view('training');
	  }
}