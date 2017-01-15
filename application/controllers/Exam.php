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
    $this->load->library('DataOption');
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
  public function Extracts($radio=3,$multiple=2,$TorF=1)
  {
    $radio=$this->Exam_model->RadioNum()['RadioNum'];
    $multiple=$this->Exam_model->MultiNum()['MultiNum'];
    $TorF=$this->Exam_model->TorFNum()['TorFNum'];
    // echo $radio."<br \>".$multiple."<br \>".$TorF;
    $radio = $this->unique_rand($this->Exam_model->RadioSum(),$radio);
    $multi = $this->unique_rand($this->Exam_model->MultiSum(),$multiple);
    $TF    = $this->unique_rand($this->Exam_model->TorFSum() ,$TorF);
    $short = $this->unique_rand($this->Exam_model->ShortSum());
    $disc  = $this->unique_rand($this->Exam_model->DissSum());
    $writing = $this->unique_rand($this->Exam_model->WritingSum());
    $result = array('radio' => $radio,'multiple'=>$multi,'TorF'=>$TF,'short'=>$short,'disc'=>$disc,'writing'=>$writing);
    return $result;
  }

  public function index()
  {
    $data['list'] = $this->Exam_model->ReadTopic($this->Extracts());
    // var_dump($data['list']);
    $this->load->view('exam/index',$data);
    // var_dump($data);
  }

  public function admin()
  {
    $this->dataoption->Export();
  }

  public function score()
  {
    $RadioDeal = str_replace('myradio','',array_keys($this->input->post()));
    $MultiDeal = str_replace('mycheckbox','',($RadioDeal));
    $TorFDeal  = str_replace('myTorF','',($MultiDeal));
    // var_dump($RadioDeal);
    // echo "<br \>";
    // var_dump($MultiDeal);echo "<br \>";
    // var_dump($TorFDeal);echo "<br \>";
    echo $this->Exam_model->GetScore(array_values($TorFDeal),array_values($this->input->post()));

  }

  public function fenzhi()
  {
    var_dump($this->Exam_model->GetFenzhi(2,'radio'));
  }
}
