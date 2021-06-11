<?php

  class ReadRSS extends Controller 
  {
    public function __construct()
    {
	  }

    public function index() {
      $this->view('readrss');
	  }
}