<?php

  class Result extends Controller 
  {
    public function __construct()
    {
	  }

    public function index() {
      $this->view('result');
	  }
}