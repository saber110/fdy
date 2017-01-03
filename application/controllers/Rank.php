<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 排行榜,学院和个人
 */
class Rank extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model(Rank_model);
  }

  public function Personal_Ranking()
  {
    $data = $this->Rank_model->Personal_Ranking(20);
    /*
    $this->load->view('rank/personal/header');
    $this->load->view('rank/personal/index',$data);
    $this->load->view('rank/personal/footer');
    */
  }

  public function College_Ranking()
  {
    $data = $this->Rank_model->College_Ranking(10);
    /*
    $this->load->view('rank/college/header');
    $this->load->view('rank/college/index',$data);
    $this->load->view('rank/college/footer');
    */
   }
   //勤奋榜
   public function Diligence_list()
   {
     $data = $this->Rank_model->Diligence_list(10);
     /*
     $this->load->view('rank/diligence/header');
     $this->load->view('rank/diligence/index',$data);
     $this->load->view('rank/diligence/footer');
     */
   }

   public function Error_Rate()
   {
     $data = $this->Rank_model->Error_Rate();
     /*
     $this->load->view('rank/error_rate/header');
     $this->load->view('rank/error_rate/index',$data);
     $this->load->view('rank/error_rate/footer');
     */
   }
}
