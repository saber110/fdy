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

  public function Someone($yb_userid=7041045)
  {
    $this->db->select('yb_username');
    $query = $this->db->get_where('examination',array('yb_userid'=>$yb_userid));
    return count($query->result_array());
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

  public function GetScore($id,$anwser)
  {
    $_anwser = array_combine($id,$anwser);
      // var_dump($id);
      // echo "<br \>";
      // var_dump($anwser);
      // echo "<br \>";
    $score = 0;
    //单选
    $num = 0;   //标志答案次序
    foreach ($id as $value) {
      if ($num > $this->RadioNum()['RadioNum'] || $this->RadioNum()['RadioNum'] == 0) {
        break;
      }
      var_dump("单选");

      $this->db->select('fenzhi');
      $query = $this->db->get_where('radio',array('id'=>$value,'anwser'=>$anwser[$num]));
      if($query->num_rows() > 0)
      {
          $score = $score + $this->GetFenzhi($value,'radio')['fenzhi'];
      }
      $num ++;
    }
    //多选
    $num = 0;
    for ($i=0; $i < $this->MultiNum()['MultiNum']; $i++) {
      $temp[$i] = implode('',$anwser[$i]);
    }
    // var_dump($anwser);
    foreach ($id as $value)
    {
      if ($num > $this->MultiNum()['MultiNum'] || $this->MultiNum()['MultiNum'] == 0) {
        break;
      }
      // var_dump("多选");

      $this->db->select('fenzhi');
      $query = $this->db->get_where('Multiple',array('id'=>$value,'anwser'=>$temp[$num]));
      if($query->num_rows() > 0)  //答案正确
      {
          $score = $score + $this->GetFenzhi($value,'Multiple')['fenzhi'];
      }
      else        //答案多选
      {
        $this->db->select('id,anwser');
        $query = $this->db->get_where('Multiple',array('id'=>$value));
        // echo $num."<br \>";
        // var_dump(($query->row_array()['anwser']));
        // var_dump(strlen($temp[$num]));
        if(strlen($query->row_array()['anwser']) < strlen($temp[$num]))
        {
          $score = $score + $this->GetFenzhi($value,'Multiple','more')['more'];
        }
        else        //答案少选
        {
          $cuoxuan = 0;   //错选标志
          foreach ($_anwser[$value] as $key) {
            var_dump($key);
            echo $value."<br \>";
            $this->db->select('anwser');
            $query = $this->db->get_where('Multiple',array('id'=>$value));
            if(!strpos($query->row_array()['anwser'],$key))  //答案错选
            {
              $cuoxuan = 1;
            }
          }
          if(!$cuoxuan)
          {
            $score = $score + $this->GetFenzhi($value,'Multiple','short')['short'];
          }
        }
      }
      $num ++;
    }
    //判断
    // var_dump($_anwser);
    $num = 0;
    foreach ($id as $value) {
      if ($num > $this->TorFNum()['TorFNum'] || $this->TorFNum()['TorFNum'] == 0) {
        break;
      }
      // var_dump($value);
      // var_dump($anwser[$num]);
      $this->db->select('fenzhi');
      $query = $this->db->get_where('TorF',array('id'=>$value,'anwser'=>$anwser[$num]));
      if ($query->num_rows() > 0) {
        $score = $score + $this->GetFenzhi($value,'TorF')['fenzhi'];
        // var_dump("n");
      }
      $num ++;
    }

    return $score;
  }
}
