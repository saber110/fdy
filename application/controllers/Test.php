<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model("Test_Mymodel");
  }
  public function index()
  {
    print_r($this->Test_Mymodel->test());
  }
}
