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

  public function Delete($type='',$id)
  {
    $query  = $this->db->delete($type,array('id' => $id));
    $result['delete'] = $query;
    return $result;
  }
  /**
   * @function 重新排序,解决id不连续
   * @author hhb  huhaobin110@gmail.com
   */
  public function Resort($type='')
  {
    $sql1 = "Alter TABLE $type Drop Id";
    $sql2 = "Alter TABLE $type ADD Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST";
    $query1 = $this->db->query($sql1);
    $query2 = $this->db->query($sql2);
    $result['yes1'] = $query1;
    $result['yes2'] = $query2;
    return $result;
  }
  public function Edit($type='radio',$id=1,$anwser  ="A",
                       $fenzhi  =2,
                       $topic   ="测试",
                       $option_A="测试答案A",
                       $option_B='测试答案B',
                       $option_C='测试答案C',
                       $option_D='测试答案D',
                       $option_E="测试答案E",
                       $option_F='测试答案F',
                       $option_G='测试答案G',
                       $option_H='测试答案H',
                       $more    = 0,
                       $short   = 2)
  {
    switch ($type) {
      case 'radio':
        {
          $data = array(
            'topic'    => $topic,
            'option_A' => $option_A,
            'option_B' => $option_B,
            'option_C' => $option_C,
            'option_D' => $option_D,
            'anwser'   => $anwser,
            'fenzhi'   => $fenzhi);
          $this->db->where('id',$id);
          return $this->db->update($type,$data);
        }
        break;
      case 'multi':
        {
          $data = array(
            'topic'    => $topic,
            'option_A' => $option_A,
            'option_B' => $option_B,
            'option_C' => $option_C,
            'option_D' => $option_D,
            'option_E' => $option_E,
            'option_F' => $option_F,
            'option_G' => $option_G,
            'option_H' => $option_H,
            'anwser'   => $anwser,
            'fenzhi'   => $fenzhi,
            'more'     => $more,
            'short'    => $short);
          $this->db->where('id',$id);
          return $this->db->update($type,$data);
        }
        break;
      case 'TorF':
        {
          $data = array(
            'topic'    => $topic,
            'anwser'   => $anwser,
            'fenzhi'   => $fenzhi);
          $this->db->where('id',$id);
          return $this->db->update($type,$data);
        }
        break;
      case 'Disc':
        {
          $data = array(
            'topic'    => $topic,
            'anwser'   => $anwser,
            'fenzhi'   => $fenzhi);
          $this->db->where('id',$id);
          return $this->db->update($type,$data);
        }
        break;
      case 'Writing':
        {
          $data = array(
            'topic'    => $topic,
            'anwser'   => $anwser,
            'fenzhi'   => $fenzhi);
          $this->db->where('id',$id);
          return $this->db->update($type,$data);
        }
        break;
      default:
        echo "禁止操作";
        break;
    }
  }
}
