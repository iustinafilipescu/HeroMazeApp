<?php

  class RSSFeed extends Controller 
  {
    public function __construct()
    {
	  }

    public function index() {
      $this->view('rssfeed');
	  }
}