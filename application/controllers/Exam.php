<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 抽题以及考试
 */
class Exam extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model("Exam_model");
  }

  /*
  * array unique_rand( int $min, int $max, int $num )
  * 生成一定数量的不重复随机数
  * $min 和 $max: 指定随机数的范围
  * $num: 指定生成数量
  */
  public function unique_rand($max, $num=1,$min=0) {
      $count = 0;
      $return = array();
      while ($count < $num) {
          $return[] = mt_rand($min, $max);
          $return = array_flip(array_flip($return));
          $count = count($return);
      }
      shuffle($return);
      return $return;
  }
  /**
   * 抽题
   * @return 题目序号
   */
  public function Extracts($radio=10,$multiple=10,$TorF=5)
  {
    $radio = unique_rand($this->Exam_model->RadioSum(),$radio);
    $multi = unique_rand($this->Exam_model->MultiSum(),$multiple);
    $TF    = unique_rand($this->Exam_model->TorFSum() ,$TorF);
    $short = unique_rand($this->Exam_model->ShortSum());
    $disc  = unique_rand($this->Exam_model->DissSum());
    $writing = unique_rand($this->Exam_model->WritingSum());
    $result = array('radio' => $radio,'multiple'=>$multi,'TorF'=>$TF,'short'=>$short,'disc'=>$disc,'writing'=>$writing);
    return $result;
  }

  public function index()
  {
    $data = $this->Exam_model->ReadTopic($this->Extracts(10,10,5))
  }
}
