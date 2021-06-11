<?php

  class Login extends Controller 
  {

    public function __construct()
    {
	  }
 
    function index() 
    {
      $this->view('login');
	  }

    function run()
	 {
	 	 $model = $this->model('User');
     $model->login();
	 }
  }