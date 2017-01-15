<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_Mymodel extends CI_Model {
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  public function test()
  {
    $query = $this->db->get("examination");
    return $query->result_array();
  }
}
