<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 题库管理
 */
class Admin_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
}
