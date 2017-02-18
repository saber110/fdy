<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."../debug/chromephp/ChromePhp.php";

/**
 * 抽题及校对
 */
class Exam_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->dbforge();
  }

  public function GainHomeData($yb_userid=7041045)
  {
    $this->db->select('sparetime,count,most_score');
    $query1 = $this->db->get_where('examination',array('yb_userid'=>$yb_userid));
    $result1 = $query1->row_array();

    $sql = "select score,sparetime from ex_$yb_userid order by time desc limit 5";
    $query2 = $this->db->query($sql);
    $result2 = $query2->result_array();
    return array('main' => $result1,'rightsidebar' => $result2);
  }

  public function Updatequoted_num($RadioId=array(1,2,3,4,5,6),$MultiId=array(1,2,3,4,5,6))
  {
    foreach($RadioId as $value) {
      $this->db->select('quoted_num');
      $query = $this->db->get_where('radio', array('id' => $value));
      $num = array('quoted_num' => $query->row_array()['quoted_num'] + 1);
      //ChromePhp::log($num);
      $this->db->where('id',$value);
      $this->db->update('radio',$num);
    }
    foreach($MultiId as $value) {
      $this->db->select('quoted_num');
      $query = $this->db->get_where('Multiple', array('id' => $value));
      $num = array('quoted_num' => $query->row_array()['quoted_num'] + 1);
      //ChromePhp::log($num);
      $this->db->where('id',$value);
      $this->db->update('Multiple',$num);
    }
  }

  public function Updatewrong_num($RadioId=array(1,2,3,4,5,6),$MultiId=array(1,2,3,4,5,6),$updater=0,$updatem=0)
  {
    if($updatem == 0)
    {
      if(is_array($RadioId))
      {
        foreach($RadioId as $value) {
          $this->db->select('wrong_num');
          $query = $this->db->get_where('radio', array('id' => $value));
          $num = array('wrong_num' => $query->row_array()['wrong_num'] + 1);
          //ChromePhp::log($num);
          $this->db->where('id',$value);
          $this->db->update('radio',$num);
        }
      }
      else {
        $this->db->select('wrong_num');
        $query = $this->db->get_where('radio', array('id' => $RadioId));
        $num = array('wrong_num' => $query->row_array()['wrong_num'] + 1);
        //ChromePhp::log($num);
        $this->db->where('id',$RadioId);
        $this->db->update('radio',$num);
      }
    }
    if($updater == 0)
    {
      if(is_array($MultiId))
      {
        foreach($MultiId as $value) {
          $this->db->select('wrong_num');
          $query = $this->db->get_where('Multiple', array('id' => $value));
          $num = array('wrong_num' => $query->row_array()['wrong_num'] + 1);
          //ChromePhp::log($num);
          $this->db->where('id',$value);
          $this->db->update('Multiple',$num);
        }
      }
      else {
        $this->db->select('wrong_num');
        $query = $this->db->get_where('Multiple', array('id' => $MultiId));
        $num = array('wrong_num' => $query->row_array()['wrong_num'] + 1);
        //ChromePhp::log($num);
        $this->db->where('id',$MultiId);
        $this->db->update('Multiple',$num);
      }

    }
  }
  public function UpdateExamination(
                                    $yb_userid=7041045,
                                    $yb_username="胡皓斌",
                                    $name = "胡皓斌",
                                    $college = "物电院",
                                    $score=0,
                                    $time=0,
                                    $phone = 15675123342,
                                    $email = "huhaobin110@gmail.com"
                                    )
  {
    $this->db->select('most_score,sparetime');
    $query = $this->db->get_where('examination',array('yb_userid'=>$yb_userid));
    if($score > ($query->row_array())['most_score'])
    {
      $data = array(
        'yb_username' => $yb_username,
        'name'        => $name,
        'college'     => $college,
        'phone'       => $phone,
        'email'       => $email,
        'most_score'   => $score,
        'sparetime'   => $time + $query->row_array()['sparetime']
      );
    }
    else {
      $data = array(
        'yb_username' => $yb_username,
        'name'        => $name,
        'college'     => $college,
        'phone'       => $phone,
        'email'       => $email,
        'sparetime'   => $time + $query->row_array()['sparetime']
      );
    }
      $this->db->where('yb_userid',$yb_userid);
      return $this->db->update('examination',$data);
  }

  public function UpdateCollege($college='物电院')
  {
    $this->db->select('college');
    $query = $this->db->get_where('examination',array('college'=>$college));
    $stuff = count($query->result_array());

    $this->db->select_max('most_score');
    $this->db->where('college',$college);
    $query = $this->db->get('examination');
    $score = $query->result_array()[0]['most_score'];

    $this->db->select('exam_num');
    $query = $this->db->get_where('college',array('college' => $college));
    $NumOld = $query->result_array()[0]['exam_num'];

    $data = array(
      'staff'    => $stuff,
      'score'    => $score,
      'exam_num' => ($NumOld+1)
    );
    $this->db->where('college',$college);
    return $this->db->update('college',$data);
  }
  public function Someone($yb_userid=7041045)
  {
    $this->db->select('yb_username');
    $query = $this->db->get_where('examination',array('yb_userid'=>$yb_userid));
    return count($query->result_array());
  }

  public function CreateTable($yb_userid = 7041045)
  {
    $this->dbforge->add_field("id");
    $attributes = array('ENGINE' => 'InnoDB');
    $fields = array(
      'detail'    => array(
                  'type'     => 'TEXT',
                  'comment'  => '作答细节'
                ),
      'score'     => array(
                  'type'    => 'INT',
                  'constraint' => 5,
                  'unsigned' => TRUE,
                  'comment'  => '此次考试得分'
                ),
       'wrong'    => array(
                   'type'     => 'TEXT',
                   'comment'  => '错误题目'
                 ),
        'time'    => array(
                    'type'     => 'timestamp'
                  ),
        'sparetime'  => array(
                    'type'     => 'TEXT',
                    'comment'  => '作答所用时间'
                  ),
        'remark'  => array(
                    'type'     => 'TEXT',
                    'comment'  => '备注'
                  )
      );
    $this->dbforge->add_field($fields);
    return $this->dbforge->create_table($yb_userid,TRUE,$attributes);
  }
  public function SetRadio($value='')
  {
    return $this->db->insert('radio',$value);
  }
  public function SetMulti($value='')
  {
    return $this->db->insert('Multiple',$value);
  }
  public function SetTorF($value='')
  {
    return $this->db->insert('TorF',$value);
  }
  public function SetShort_answer($value='')
  {
    return $this->db->insert('Short_answer',$value);
  }
  public function SetDiscussion($value='')
  {
    return $this->db->insert('Discussion',$value);
  }
  public function SetWriting($value='')
  {
    return $this->db->insert('writing',$value);
  }
  public function RadioSum()
  {
    return $this->db->count_all('radio');
  }

  public function RadioNum($topic='测试')
  {
    $this->db->select('RadioNum');
    $query = $this->db->get_where('kaoshi',array('topic'=>$topic));
    return $query->row_array();
  }
  public function MultiNum($topic='测试')
  {
    $this->db->select('MultiNum');
    $query = $this->db->get_where('kaoshi',array('topic'=>$topic));
    return $query->row_array();
  }
  public function TorFNum($topic='测试')
  {
    $this->db->select('TorFNum');
    $query = $this->db->get_where('kaoshi',array('topic'=>$topic));
    return $query->row_array();
  }
  public function MultiSum()
  {
    return $this->db->count_all('Multiple');
  }

  public function TorFSum()
  {
    return $this->db->count_all('TorF');
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
    //ChromePhp::log($para['multiple']);
    $this->Updatequoted_num($para['radio'],$para['multiple']);
    $RadioNum = 0;
    foreach ($para['radio'] as $id) {
      $this->db->select('id,topic,option_A,option_B,option_C,option_D');
      $query = $this->db->get_where('radio',array('id'=>$id));
      $RadioRes[$RadioNum++] = $query->result_array();
    }
    $MultiNum = 0;
    foreach ($para['multiple'] as $id) {
      $this->db->select('id,topic,option_A,option_B,option_C,option_D,option_E,option_F,option_G,option_H');
      $query = $this->db->get_where('Multiple',array('id'=>$id));
      $MultiRes[$MultiNum++] = $query->result_array();
    }
    $TorFNum = 0;
    foreach ($para['TorF'] as $id) {
      $this->db->select('id,topic');
      $query = $this->db->get_where('TorF',array('id'=>$id));
      $TorFRes[$TorFNum++] = $query->result_array();
    }

    $this->db->select('id,topic');
    $query = $this->db->get_where('Short_answer',array('id'=>$para['short'][0]));
    $ShortRes = $query->result_array();

    $this->db->select('id,topic');
    $query = $this->db->get_where('Discussion',array('id'=>$para['disc'][0]));
    $DiscRes = $query->result_array();

    $this->db->select('id,topic');
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

  public function GetFenzhi($id,$type,$fenzhi='fenzhi')
  {
    $this->db->select($fenzhi);
    $query = $this->db->get_where($type,array('id'=>$id));
    $result = $query->row_array();
    return $result;
  }

  public function RScore($id,$anwser)
  {
    $num = 0;$radio_num=0;$multi_num=0;$TorFnum=0;
    foreach ($id as $value)
    {
      if($num < $this->RadioNum()['RadioNum'])
      {
        $RadioId[$radio_num++]=$value;
      }
      elseif($num < ($this->RadioNum()['RadioNum'] + $this->MultiNum()['MultiNum']))
      {
        $MultiId[$multi_num++]=$value;
      }
      // elseif($num < ($this->RadioNum()['RadioNum'] + $this->MultiNum()['MultiNum'] + $this->TorFNum()['TorFNum'] ))
      // {
      //   $TorFId[$TorFnum++]=$value;
      // }
      $num ++;
    }
    return array(
      'RadioId' => $RadioId,
      'MultiId' => $MultiId
      // 'TorFId'  => $TorFId
    );
  }
  public function GetScore($id,$anwser)
  {
    $InputId = $this->RScore($id,$anwser);
    $_anwser = array_combine($id,$anwser);
    $score = 0;
    $xu_id = 0;

    //单选
    $num = 0;   //标志答案次序
    foreach ($InputId['RadioId'] as $value) {
      $this->db->select('fenzhi');
      $query = $this->db->get_where('radio',array('id'=>$value,'anwser'=>$anwser[$num]));
      if($query->num_rows() > 0)
      {
          $score = $score + $this->GetFenzhi($value,'radio')['fenzhi'];
      }
      else
      {
        $wrongR[$value] = $anwser[$num];
      }
      $num ++;
    }
    // echo '单选'.$xu_id.'成绩'.$score.'总数'.$this->RadioNum()['RadioNum'].'<br \>';
    foreach ($InputId['MultiId'] as $value)
    {
      $this->db->select('fenzhi');
      $query = $this->db->get_where('Multiple',array('id'=>$value,'anwser'=>implode('',$anwser[$num])));
      if($query->num_rows() > 0)  //答案正确
      {
          $score = $score + $this->GetFenzhi($value,'Multiple')['fenzhi'];
          //ChromePhp::log($value."多选答案正确 ".$score."<br \>");
      }
      else        //答案多选
      {
        $this->db->select('id,anwser');
        $query = $this->db->get_where('Multiple',array('id'=>$value));
        if(strlen($query->row_array()['anwser']) < strlen(implode('',$anwser[$num])))
        {
          $score = $score + $this->GetFenzhi($value,'Multiple','more')['more'];
          //ChromePhp::log($value."多".$score."<br \>");
        }
        else        //答案少选
        {
          $cuoxuan = 0;   //错选标志
          foreach ($_anwser[$value] as $key)
          {
            $this->db->select('anwser');
            $query = $this->db->get_where('Multiple',array('id'=>$value));
            if(strpos($query->row_array()['anwser'],$key)===FALSE)  //答案错选
            {
              $cuoxuan = 1;
              //ChromePhp::log($value."错选 ");
            }
            // echo $cuoxuan."<br \>";
          }
          if(!$cuoxuan)
          {
            $score = $score + $this->GetFenzhi($value,'Multiple','short')['short'];
            //ChromePhp::log($value."少选");
          }
          else
          {
            $wrongM[$value] = $anwser[$num];
          }
        }
      }
      $num ++;
    }
    /**
     * 判断题答案盯对
     */
  // elseif($xu_id < ($this->RadioNum()['RadioNum'] + $this->MultiNum()['MultiNum'] + $this->TorFNum()['TorFNum']))
  // {
  //   //判断
  //   foreach ($InputId['TorFId'] as $value) {
  //     echo "判断id ".$value."对应答案".$anwser[$num]."<br \>";
  //     $this->db->select('fenzhi');
  //     $query = $this->db->get_where('TorF',array('id'=>$value,'anwser'=>$anwser[$num]));
  //     if ($query->num_rows() > 0) {
  //       $score = $score + $this->GetFenzhi($value,'TorF')['fenzhi'];
  //       // var_dump("n");
  //     }
  //     else
  //     {
  //       $wrong['TorF'.$value] = $anwser[$num];
  //     }
  //     $num ++;
  //   }
  // }
  // else {
  //   echo "break ".$xu_id."<br \>";
  //   break;
  // }

  if(isset($wrongR) && isset($wrongM)) {
    $this->Updatewrong_num(array_keys($wrongR),array_keys($wrongM));
  }
  elseif(!isset($wrongR) && isset($wrongM)){
    $wrongR = array('null');
    $this->Updatewrong_num($wrongR,array_keys($wrongM),1);
  }
  elseif(isset($wrongR) && !isset($wrongM)){
    $wrongM = array('null');
    $this->Updatewrong_num(array_keys($wrongR),$wrongM,0,1);
  }
  else {
    $wrongR = array('null');
    $wrongM = array('null');
  }

  return array('score'=>$score,'wrong'=>array_merge($wrongR,$wrongM));
  }

  public function InsertScore(
                      $yb_userid=7041045,
                      $score=0,
                      $detail='1:B,2:C',
                      $wrong ='4:C',
                      $sparetime = 0)
  {
    return $this->db->insert('ex_'.$yb_userid,array(
      'detail' => $detail,
      'score'  => $score,
      'wrong'  => $wrong,
      'sparetime'=>$sparetime
    ));
  }

  public function Admin($yb_userid = 7041045)
  {
    $this->db->select('id');
    $query = $this->db->get_where('setting',array('yb_userid'=>$yb_userid));
    return count($query->result_array());
  }
}
