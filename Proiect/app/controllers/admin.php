<?php

  class Admin extends Controller 
  {
    public function __construct()
    {
	  }

    public function index() {
      $this->view('admin');
	  }
}