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
    $sql = "select yb_userid,name,college,most_score from examination order by last_score desc limit $num";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function College_Ranking($num=10)
  {
    $sql = "select college,staff,score,exam_num from college order by score desc limit $num";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function Diligence_list($value=10)
  {
    $sql = "select yb_userid,name,college,sparetime,most_score from examination order by sparetime desc limit $value";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function Error_Rate($radio=5,$multiple=3,$TorF=2)
  {
    $sql = "select topic,option_A,option_B,option_C,option_D,anwser from radio order by (wrong_num/quoted_num) desc limit $radio";
    $query = $this->db->query($sql);
    $radio = $query->result_array();
    $sql = "select  topic,option_A,option_B,option_C,option_D,option_E,option_F,option_G,option_H,anwser from Multiple order by (wrong_num/quoted_num) desc limit $multiple";
    $query = $this->db->query($sql);
    $multiple = $query->result_array();
    $sql = "select  topic,anwser from TorF order by (wrong_num/quoted_num) desc limit $TorF";
    $query = $this->db->query($sql);
    $TorF  = $query->result_array();
    $result = array('radio' => $radio,'multiple'=>$multiple,'TorF'=>$TorF);
    return $result;
  }
}
