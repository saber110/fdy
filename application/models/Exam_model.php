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
    $this->load->dbforge();
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
        'zanliu'  => array(
                    'type'     => 'TEXT',
                    'comment'  => '待用项'
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
      elseif($num < ($this->RadioNum()['RadioNum'] + $this->MultiNum()['MultiNum'] + $this->TorFNum()['TorFNum'] ))
      {
        $TorFId[$TorFnum++]=$value;
      }
      $num ++;
    }
    return array(
      'RadioId' => $RadioId,
      'MultiId' => $MultiId,
      'TorFId'  => $TorFId
    );
  }
  public function GetScore($id,$anwser)
  {
    $InputId = $this->RScore($id,$anwser);
    $_anwser = array_combine($id,$anwser);
      // var_dump($id);
      // echo "<br \>";
    // var_dump($this->RScore($id,$anwser));echo "<br \>";
    $score = 0;
    $xu_id = 0;

      //单选
      $num = 0;   //标志答案次序
      foreach ($InputId['RadioId'] as $value) {
        // echo "RadioNum";
        // var_dump($this->RadioNum()['RadioNum']);
        // if (($num+1) > $this->RadioNum()['RadioNum'] || $this->RadioNum()['RadioNum'] == 0) {
        //   // echo 'num_break'.$num."<br \>";
        //   break;
        // }
        // echo 'num'.$num."<br \>";
        // var_dump("单选");

        $this->db->select('fenzhi');
        $query = $this->db->get_where('radio',array('id'=>$value,'anwser'=>$anwser[$num]));
        if($query->num_rows() > 0)
        {
            $score = $score + $this->GetFenzhi($value,'radio')['fenzhi'];
        }
        else
        {
          // var_dump($anwser[$num]);
          $wrong['Radio'.$value] = $anwser[$num];
        }
        $num ++;
      }
      echo '单选'.$xu_id.'成绩'.$score.'总数'.$this->RadioNum()['RadioNum'].'<br \>';


  //   elseif($xu_id < ($this->RadioNum()['RadioNum'] + $this->MultiNum()['MultiNum']))
  //   {
  //     //多选
  //     echo "多选 ".$xu_id."多选总数".($this->RadioNum()['RadioNum'] + $this->MultiNum()['MultiNum'])."<br \>";
  //     $num = 0;
  //     for ($i=$xu_id; $i < ($this->MultiNum()['MultiNum'] + $num_multi); $i++) {
  //       echo "多选 ".$xu_id.' id '.$i."<br \>".'anwser'."<br \>";
  //       var_dump($anwser[$i]);echo "<br \>";
  //       $temp[$i - $xu_id] = implode('',$anwser[$i]);
  //     }
  //     echo "temp";
      // var_dump($InputId['MultiId'] );
      foreach ($InputId['MultiId'] as $value)
      {

        // if ($num >= $this->MultiNum()['MultiNum'] || $this->MultiNum()['MultiNum'] == 0) {
        //   break;
        // }
        echo '多选id'.$value."<br \>"."填写答案 ";var_dump(implode('',$anwser[$num]));echo "<br \>";

        $this->db->select('fenzhi');
        $query = $this->db->get_where('Multiple',array('id'=>$value,'anwser'=>implode('',$anwser[$num])));
        if($query->num_rows() > 0)  //答案正确
        {
            $score = $score + $this->GetFenzhi($value,'Multiple')['fenzhi'];
            echo "多选答案正确 ".$score."<br \>";
        }
        else        //答案多选
        {
          $this->db->select('id,anwser');
          $query = $this->db->get_where('Multiple',array('id'=>$value));
          // echo $num."<br \>";
          // var_dump(($query->row_array()['anwser']));
          // var_dump(strlen($temp[$num]));
          if(strlen($query->row_array()['anwser']) < strlen(implode('',$anwser[$num])))
          {
            $score = $score + $this->GetFenzhi($value,'Multiple','more')['more'];
          }
          else        //答案少选
          {
            $cuoxuan = 0;   //错选标志
            var_dump($_anwser[$value] );
            foreach ($_anwser[$value] as $key)
            {
              // var_dump($key);
              // echo $value."<br \>";
              $this->db->select('anwser');
              $query = $this->db->get_where('Multiple',array('id'=>$value));
              echo 'id '.$value.'答案 '.$key."<br \>";
              var_dump(!strpos($query->row_array()['anwser'],$key));
              if(strpos($query->row_array()['anwser'],$key)===FALSE)  //答案错选
              {
                $cuoxuan = 1;
                echo "错选 ";
              }
              echo $cuoxuan."<br \>";
            }
            if(!$cuoxuan)
            {
              $score = $score + $this->GetFenzhi($value,'Multiple','short')['short'];
              echo "少选";
            }
            else
            {
              $wrong['Multi'.$value] = $anwser[$num];
            }
          }
        }
        $num ++;
      }
  //   }
  //   elseif($xu_id < ($this->RadioNum()['RadioNum'] + $this->MultiNum()['MultiNum'] + $this->TorFNum()['TorFNum']))
  //   {
  //     //判断
  //     // var_dump($_anwser);
      echo "判断<br \>";
  //     $num = 0;
      foreach ($InputId['TorFId'] as $value) {
        // if ($num >= $this->TorFNum()['TorFNum'] || $this->TorFNum()['TorFNum'] == 0) {
        //   break;
        // }
        // var_dump($value);
        // var_dump($anwser[$num]);
        echo "判断id ".$value."对应答案".$anwser[$num]."<br \>";
        $this->db->select('fenzhi');
        $query = $this->db->get_where('TorF',array('id'=>$value,'anwser'=>$anwser[$num]));
        if ($query->num_rows() > 0) {
          $score = $score + $this->GetFenzhi($value,'TorF')['fenzhi'];
          // var_dump("n");
        }
        else
        {
          $wrong['TorF'.$value] = $anwser[$num];
        }
        $num ++;
      }
  //   }
  //   else {
  //     echo "break ".$xu_id."<br \>";
  //     break;
  //   }
  //   // $xu_id ++;
  // // }
return array('score'=>$score/*,'wrong'=>$wrong*/);
  }

  public function InsertScore(
                      $yb_userid=7041045,
                      $score=0,
                      $detail='1:B,2:C',
                      $wrong ='4:C')
  {
    return $this->db->insert('ex_'.$yb_userid,array(
      'detail' => $detail,
      'score'  => $score,
      'wrong'  => $wrong
    ));
  }
}
