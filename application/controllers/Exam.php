<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 抽题以及考试. test.
 */
class Exam extends CI_Controller
{
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Exam_model');
        $this->load->model('Admin_model');
        $this->load->library('DataOption');
  //    // 服务器
  //    $config = array('appID' => '7c98d646b93a939d',
  //                   'appSecret' => 'b21ca6a01ecc66d9de48daf75d7a5b52',
  //                    'callback' => 'http://f.yiban.cn/iapp96603', );
  //   //本地测试
  //  //$config = array('appID' => '2603163d78712ee3',
  //  //                    'appSecret' => '1ce9ffc76d284c5dde2a2002feed6c45',
  //   //                    'callback' => 'http://f.yiban.cn/iapp62933', );

  //       $this->load->library('YibanSDK', $config, 'yiban');
  //    //var_dump($this->session->token);
  //    //$au  = $this->yiban->getAuthorize();
  //    //var_dump($token);
  //     if (!$this->input->get('verify_request')) {
  //         $this->session->url = $_SERVER['REQUEST_URI'];
  //     }
  //     //var_dump($this->session);
  //     if (!isset($this->session->token)) {     // 未获取授权
  //     /**
  //      * 从授权服务器回调返回时，URL中带有code（授权码）参数.
  //      */
  //         $au = $this->yiban->getAuthorize();
  //         //var_dump($this->input->post());
  //         if ($this->input->get('verify_request')) {
  //             /**
  //              * 使用授权码（code）获取访问令牌
  //              * 若获取成功，返回 $info['access_token']
  //              * 否则查看对应的 msgCN 查看错误信息.
  //              */
  //             $info = $this->yiban->getFrameUtil()->perform();
  //             //var_dump($info);
  //             if (!isset($info['visit_oauth']['access_token'])) {
  //                 //echo $info['msgCN'];
  //                 redirect($au->forwardurl());
  //             }
  //             $this->session->token = $info['visit_oauth']['access_token'];
  //             $this->data['user_info']['yb_userid'] = $info['visit_user']['userid'];
  //             $this->data['user_info']['yb_username'] = $info['visit_user']['username'];
  //             header('Location: '.$this->session->url);
  //         } else {   // 重定向到授权服务器（原sdk使用header()重定向）
  //             redirect($au->forwardurl());
  //             // header('Location: ' . $au->forwardurl());
  //         }
  //     }
  //       if (!isset($this->data['user_info']['yb_userhead']) && $this->session->token) {
  //           $this->user = $this->yiban->getUser($this->session->token);
  //           $this->data['user_info'] = $this->user->me()['info'];
  //       }
  //       $this->user = $this->yiban->getUser($this->session->token);
  //       $this->data['user_info'] = $this->user->me()['info'];
        $this->data['user_info']['yb_userid'] = 7041045;
        $this->data['user_info']['yb_username'] = '胡皓斌';
        $this->data['user_info']['yb_userhead'] = '胡皓斌';
        if (isset($this->input->post()['collegeBuild'])) {
            $this->Exam_model->UpdateExamination($this->data['user_info']['yb_userid'], $this->data['user_info']['yb_username'],
               $this->data['user_info']['yb_username'], $this->input->post()['collegeBuild']);
            $this->Exam_model->SetCollege($this->Exam_model->GetCollege($this->data['user_info']['yb_userid'])['college']);
            if ($this->Someone($this->data['user_info']['yb_userid']) > 0) {
                echo 1;
            } else {
                echo 0;
            }
            exit;
        } elseif ($this->Someone($this->data['user_info']['yb_userid']) === 0) {
            $this->CreateTable($this->data['user_info']['yb_userid']);
            redirect(base_url().'Rank/select');
        }
        $this->data['type'] = $this->Admin_model->Settype()['type'];
    }

    public function index($value = '')
    {
        $result['username'] = $this->data['user_info']['yb_username'];
        $result['userhead'] = $this->data['user_info']['yb_userhead'];

        $result['data'] = $this->Exam_model->GainHomeData($this->data['user_info']['yb_userid']);
        $this->load->view('home/header');
        $this->load->view('home/index', $result);
        $this->load->view('home/footer');
    }

    public function timer()
    {
        $start = strtotime(date('Y-m-d h:i:s'));
        $timehhh = $start - strtotime($this->session->time);
        $m = floor(($timehhh % (86400)) / 60);
        // echo $m;
        $this->session->TimeSubmit = $m;
        echo $this->session->TimeSubmit;
    }

    public function UpdateCollege($value = '')
    {
        var_dump($this->Exam_model->UpdateCollege());
    }
  /**
   * @param 输入:所登录用户的易班id
   * @param 输出:为零则需要后续建表操作
   */
  private function Someone($yb_userid = 7041045)
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
      if($this->data['type']=="初赛")
      {
        $radio = $this->Exam_model->RadioNum($this->data['type'])['RadioNum'];
        $multiple = $this->Exam_model->MultiNum($this->data['type'])['MultiNum'];
        $TorF = $this->Exam_model->TorFNum($this->data['type'])['TorFNum'];
        $radio = $this->unique_rand($this->Exam_model->RadioSum(), $radio);
        $multi = $this->unique_rand($this->Exam_model->MultiSum(), $multiple);
        $TF = $this->unique_rand($this->Exam_model->TorFSum(), $TorF);
        $short = $this->unique_rand($this->Exam_model->ShortSum());
        $disc = $this->unique_rand($this->Exam_model->DissSum());
        $writing = $this->unique_rand($this->Exam_model->WritingSum());
      }
      else
      {
        $radio = $this->Exam_model->RadioNum($this->data['type'])['RadioNum'];        //填空题目数量
        $TorF = $this->Exam_model->PanduanNum($this->data['type'])['TorFNum'];           //panduan题目数量
        $multiple = $this->Exam_model->MultiNum($this->data['type'])['MultiNum'];     //不定项题目数量
        $radio = $this->unique_rand($this->Exam_model->TorFSum(), $radio);
        $multi = $this->unique_rand($this->Exam_model->MultiSum(), $multiple);
        $TF = $this->unique_rand($this->Exam_model->PanduanSum(), $TorF);
        $short = $disc = $writing = 0;
      }
      // echo $radio."<br \>".$multiple."<br \>".$TorF;
      $result = array('radio' => $radio, 'multiple' => $multi, 'TorF' => $TF, 'short' => $short, 'disc' => $disc, 'writing' => $writing);
      return $result;
  }

    public function exam()
    {
        $this->session->time = date('Y-m-d h:i:s');
        // var_dump($this->Extracts());exit;
        $data['list'] = $this->Exam_model->ReadTopic($this->Extracts(),$this->data['type']);
        $data['type'] = $this->data['type'];
        $data['number'] = $this->Exam_model->RadioNum($data['type'])['RadioNum'] + $this->Exam_model->MultiNum($data['type'])['MultiNum'] + $this->Exam_model->TorFNum($data['type'])['TorFNum'] + 3;

        $this->load->view('exam/header');
        $this->load->view('exam/index', $data);
        $this->load->view('exam/footer');
        // var_dump($data);
    }

    public function score()
    {
      if($this->data['type'] == "初赛")
      {
        $RadioDeal = str_replace('myradio', '', array_keys($this->input->post()));
        $MultiDeal = str_replace('mycheckbox', '', ($RadioDeal));
        $TorFDeal = str_replace('myTorF', '', ($MultiDeal));
        $result = $this->Exam_model->GetScore(array_values($TorFDeal), array_values($this->input->post()),$this->data['type']);

        $this->Exam_model->InsertScore($this->data['user_info']['yb_userid'],
                                   $result['score'],
                                   json_encode($this->input->post()),
                                   json_encode($result['wrong']),
                                   $this->session->TimeSubmit
                                 );
        $this->Exam_model->UpdateExamination($this->data['user_info']['yb_userid'],
                                         $this->data['user_info']['yb_username'],
                                         $this->data['user_info']['yb_username'],
                                         $this->Exam_model->GetCollege($this->data['user_info']['yb_userid'])['college'],
                                         $result['score'],
                                         $this->session->TimeSubmit
                                         );
        $this->Exam_model->UpdateCollege($this->Exam_model->GetCollege($this->data['user_info']['yb_userid'])['college']);
        echo $result['score'];
      }
      else
      {
        $RadioDeal = str_replace('myblank', '', array_keys($this->input->post()));
        $MultiDeal = str_replace('mycheckbox', '', ($RadioDeal));
        $TorFDeal = str_replace('mypanduan', '', ($MultiDeal));
        $result = $this->Exam_model->GetScore(array_values($TorFDeal), array_values($this->input->post()),$this->data['type']);
        $this->Exam_model->InsertScore($this->data['user_info']['yb_userid'],
                                   $result['score'],
                                   json_encode($this->input->post()),
                                   json_encode('备用'),
                                   $this->session->TimeSubmit
                                 );
        $this->Exam_model->UpdateExamination($this->data['user_info']['yb_userid'],
                                         $this->data['user_info']['yb_username'],
                                         $this->data['user_info']['yb_username'],
                                         $this->Exam_model->GetCollege($this->data['user_info']['yb_userid'])['college'],
                                         $result['score'],
                                         $this->session->TimeSubmit
                                         );
        $this->Exam_model->UpdateCollege($this->Exam_model->GetCollege($this->data['user_info']['yb_userid'])['college']);
        echo $result['score'];
      }
    }
}
