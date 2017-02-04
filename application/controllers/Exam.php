<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 抽题以及考试. test
 */
class Exam extends CI_Controller
{
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Exam_model');
        $this->load->library('DataOption');

    // // 服务器
    // $config = array('appID' => '1bafaee2c7b237e4',
    //                'appSecret' => '37f8abf0110f0ef65908afc5e008524b',
    //                 'callback' => "http://f.yiban.cn/iapp95569");
    //本地测试
   $config = array('appID' => '2603163d78712ee3',
                       'appSecret' => '1ce9ffc76d284c5dde2a2002feed6c45',
                        'callback' => 'http://f.yiban.cn/iapp62933', );
        $this->load->library('YibanSDK', $config, 'yiban');
     //var_dump($this->session->token);
     //$au  = $this->yiban->getAuthorize();
     //var_dump($token);
    //  if (!$this->input->get('verify_request')) {
    //      $this->session->url = $_SERVER['REQUEST_URI'];
    //  }
    //  //var_dump($this->session);
    //  if (!isset($this->session->token)) {     // 未获取授权
    //  /**
    //   * 从授权服务器回调返回时，URL中带有code（授权码）参数
    //   *
    //   */

    //      $au  = $this->yiban->getAuthorize();
    //      //var_dump($this->input->post());
    //      if ($this->input->get('verify_request')) {
    //      /**
    //       * 使用授权码（code）获取访问令牌
    //       * 若获取成功，返回 $info['access_token']
    //       * 否则查看对应的 msgCN 查看错误信息
    //       */
    //          $info = $this->yiban->getFrameUtil()->perform();
    //          //var_dump($info);
    //          if (!isset($info['visit_oauth']['access_token'])) {
    //              //echo $info['msgCN'];
    //              redirect($au->forwardurl());
    //          }
    //          $this->session->token = $info['visit_oauth']['access_token'];
    //          $this->data['user_info']['yb_userid'] = $info['visit_user']['userid'];
    //          $this->data['user_info']['yb_username'] = $info['visit_user']['username'];
    //          header("Location: " . $this->session->url);
    //      }
    //      else {   // 重定向到授权服务器（原sdk使用header()重定向）
    //          redirect($au->forwardurl());
    //          // header('Location: ' . $au->forwardurl());
    //      }
    //  }
    //  if(!isset($this->data['user_info']) && $this->session->token){
    //      $this->user = $this->yiban->getUser($this->session->token);
    //      $this->data['user_info'] = $this->user->me()['info'];
    //  }

    $this->data['user_info']['yb_userid'] = 7041045;
        $this->data['user_info']['yb_username'] = '胡皓斌';
        $this->data['user_info']['yb_realname'] = '胡皓斌';
        if ($this->Someone($this->data['user_info']['yb_userid']) === 0) {
            $this->CreateTable($this->data['user_info']['yb_userid']);
        }
    }

    public function nihao($value = '')
    {
        var_dump($this->Extracts());
    }
    public function UpdateCollege($value = '')
    {
        var_dump($this->Exam_model->UpdateCollege());
    }
  /**
   * @param 输入:所登录用户的易班id
   * @param 输出:为零则需要后续建表操作
   */
  public function Someone($yb_userid = 7041045)
  {
      return $this->Exam_model->Someone($yb_userid);
  }

    public function CreateTable($yb_userid = 7041045)
    {
        return $this->Exam_model->CreateTable('ex_'.$yb_userid);
    }
  /*
  * array unique_rand( int $min, int $max, int $num )
  * 生成一定数量的不重复随机数
  * $min 和 $max: 指定随机数的范围
  * $num: 指定生成数量
  */
  public function unique_rand($max, $num = 1, $min = 1)
  {
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
   * 抽题.
   *
   * @return 题目序号
   */
  public function Extracts($radio = 3, $multiple = 2, $TorF = 1)
  {
      $radio = $this->Exam_model->RadioNum()['RadioNum'];
      $multiple = $this->Exam_model->MultiNum()['MultiNum'];
      $TorF = $this->Exam_model->TorFNum()['TorFNum'];
    // echo $radio."<br \>".$multiple."<br \>".$TorF;
    $radio = $this->unique_rand($this->Exam_model->RadioSum(), $radio);
      $multi = $this->unique_rand($this->Exam_model->MultiSum(), $multiple);
      $TF = $this->unique_rand($this->Exam_model->TorFSum(), $TorF);
      $short = $this->unique_rand($this->Exam_model->ShortSum());
      $disc = $this->unique_rand($this->Exam_model->DissSum());
      $writing = $this->unique_rand($this->Exam_model->WritingSum());
    //下句仅供测试使用
    // $multi = $TF = $short = $disc = $writing ='';
    $result = array('radio' => $radio, 'multiple' => $multi, 'TorF' => $TF, 'short' => $short, 'disc' => $disc, 'writing' => $writing);

      return $result;
  }

    public function index()
    {
        $data['list'] = $this->Exam_model->ReadTopic($this->Extracts());
        $data['number'] = $this->Exam_model->RadioNum()['RadioNum'];
        // var_dump($data['list']);
        $this->load->view('exam/header');
        $this->load->view('exam/index', $data);
        $this->load->view('exam/footer');
        // var_dump($data);
    }

    public function score()
    {
        $RadioDeal = str_replace('myradio', '', array_keys($this->input->post()));
        $MultiDeal = str_replace('mycheckbox', '', ($RadioDeal));
        $TorFDeal = str_replace('myTorF', '', ($MultiDeal));
        $result = $this->Exam_model->GetScore(array_values($TorFDeal), array_values($this->input->post()));
        $this->Exam_model->InsertScore($this->data['user_info']['yb_userid'],
                                   $result['score'],
                                   json_encode($this->input->post()),
                                   json_encode($result['wrong'])
                                 );
        $this->Exam_model->UpdateExamination($this->data['user_info']['yb_userid'],
                                         $this->data['user_info']['yb_username'],
                                         $this->data['user_info']['yb_realname'],
                                         '物理院',
                                         $result['score']
                                         );           //记得填入参数
    $this->Exam_model->UpdateCollege();
        echo $result['score'];
    }
}
