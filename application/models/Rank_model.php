<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 排行榜相关数据库操作
 */
class Rank_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function Personal_Ranking($num=20)
  {
    $sql = "select top $num * form examination order by last_score desc";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function College_Ranking($num=10)
  {
    $sql = "select top $num * form college order by score desc";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function Diligence_list($value=10)
  {
    $sql = "select top $value * form examination order by count desc";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function Error_Rate($radio=5,$multiple=3,$TorF=2)
  {
    $sql = "select top $radio * form radio order by (wrong_num/quoted_num) desc";
    $radio = $this->db->query($sql);
    $sql = "select top $multiple * form examination order by count desc";
    $multiple = $this->db->query($sql);
    $sql = "select top $TorF * form examination order by count desc";
    $TorF = $this->db->query($sql);
    $result = array('radio' => $radio,'multiple'=>$multiple,'TorF'=>$TorF);
    return $result;
  }
}
