<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 抽题及校对
 */
class Exam_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function RadioSum()
  {
    return $this->db->count_all('radio');
  }

  public function MultiSum()
  {
    return $this->db->count_all('Multiple');
  }

  public function TorFSum()
  {
    return $this->db->count_all('T/F');
  }

  public function ShortSum()
  {
    return $this->db->count_all('Short_answer');
  }

  public function DissSum()
  {
    return $this->db->count_all('Discussion');
  }

  public function WritingSum()
  {
    return $this->db->count_all('writing');
  }

  public function ReadTopic($para = array('radio'=>array(1,2,3,4,5),
                                  'multiple'=>array(5,6,7,8,9),
                                  'TorF'=>array(1,2,3,4,5),
                                  'short'   => 1,
                                  'disc'    => 1,
                                  'writing' => 1))
  {
    $RadioNum = 0;
    foreach ($para['radio'] as $id) {
      $this->db->select('topic,option_A,option_B,option_C,option_D');
      $query = $this->db->get_where('radio',array('id'=>$id));
      $RadioRes[$RadioNum++] = $query->result_array();
    }
    $MultiNum = 0;
    foreach ($para['radio'] as $id) {
      $this->db->select('topic,option_A,option_B,option_C,option_D,option_E,option_F,option_G,option_H');
      $query = $this->db->get_where('Multiple',array('id'=>$id));
      $MultiRes[$MultiNum++] = $query->result_array();
    }
    $TorFNum = 0;
    foreach ($para['radio'] as $id) {
      $this->db->select('topic');
      $query = $this->db->get_where('T/F',array('id'=>$id));
      $TorFRes[$TorFNum++] = $query->result_array();
    }

    $this->db->select('topic');
    $query = $this->db->get_where('Short_answer',array('id'=>$para['short'][0]));
    $ShortRes = $query->result_array();

    $this->db->select('topic');
    $query = $this->db->get_where('Discussion',array('id'=>$para['disc'][0]));
    $DiscRes = $query->result_array();

    $this->db->select('topic');
    $query = $this->db->get_where('writing',array('id'=>$para['writing'][0]));
    $writingRes = $query->result_array();
    return array(
      'radio'=>$RadioRes,
      'multi'=>$MultiRes,
      'TorF' =>$TorFRes,
      'short'=>$ShortRes,
      'disc' =>$DiscRes,
      'writ' =>$writingRes
    );
  }
}
