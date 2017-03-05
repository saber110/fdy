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
    $this->load->model("Rank_model");
  }
    public function select($value = '')
    {
        $this->load->view('home/college');
    }
  public function index()
  {
    $personal = $this->Rank_model->Personal_Ranking(10);
    $college  = $this->Rank_model->College_Ranking(10);
    $result = array('personal'=>$personal,'college'=>$college);
    $this->load->view('rank/index',$result);
  }

   //勤奋榜
   public function Diligence_list()
   {
     $data['lists'] = $this->Rank_model->Diligence_list(10);
    //  var_dump($data['lists']);
     $this->load->view('rank/header');
     $this->load->view('rank/diligence',$data);
     $this->load->view('rank/footer');
   }

   public function Error_Rate()
   {
     $data['wrong'] = $this->Rank_model->Error_Rate();
     $this->load->view('rank/header');
     $this->load->view('rank/wrong',$data);
     $this->load->view('rank/footer');
   }
}
