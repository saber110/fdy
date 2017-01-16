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
  /**
   * @param 输入:所登录用户的易班id
   * @param 输出:为零则需要后续建表操作
   */
  public function Someone($yb_userid = 7041045)
  {
    return $this->Exam_model->Someone($yb_userid);
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
    // $this->dataoption->Export();
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

  public function ImportRadio()
  {
    $config['upload_path'] = 'attach/radio';
    $config['allowed_types'] = "xlsx|xls";
    $config['file_ext_tolower'] = true;
    $config['overwrite'] = true;
    $config['max_size']     = 100;
    $config['max_width']        = 1024;
    $config['max_height']       = 768;
    $this->load->helper('form');
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('userfile')) {
        $data['error'] = $this->upload->display_errors();
        $this->load->view('exam/admin/index',$data);
    } else {
        $upload_data = array('upload_data' => $this->upload->data());
        // var_dump($upload_data);
        $objReader = PHPExcel_IOFactory::createReader('Excel2007'); //use Excel5 for 2003 format
        $excelpath = 'attach/radio/'.$upload_data['upload_data']['file_name'];
        $objPHPExcel = $objReader->load($excelpath);
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();           //取得总行数
        // var_dump('ROW');
        // var_dump($highestRow);
        $highestColumn = $sheet->getHighestColumn();     //取得总列数
        // var_dump('columu');
        // var_dump($highestColumn);

        for ($j = 3; $j <= $highestRow; ++$j) {                       //从第二行开始读取数据

            $str = '';

            for ($k = 'A'; $k <= $highestColumn; ++$k) {            //从A列读取数据
                 $str .= $objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue().'|*|'; //读取单元格
            }
            $strs = explode('|*|', $str);
            // var_dump($str);
            $sql = array(
                'topic' => $strs[0],
                'Option_A' => $strs[1],
                'Option_B' => $strs[2],
                'Option_C' => $strs[3],
                'Option_D' => $strs[4],
                'anwser' => $strs[5],
                'fenzhi' => $strs[6]
                );
            // var_dump($sql);
            $flag = 1;
            if (!$this->Exam_model->SetRadio($sql))
            {
              $flag = 0;
            }
            if(!$flag)
            {
              $result = 0;    //插入失败
            }
        }
    }
  }

  public function ImportMulti()
  {
    $config['upload_path'] = 'attach/multi';
    $config['allowed_types'] = "xlsx|xls";
    $config['file_ext_tolower'] = true;
    $config['overwrite'] = true;
    $config['max_size']   = 100;
    $config['max_width']  = 1024;
    $config['max_height'] = 768;
    $this->load->helper('form');
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('userfile')) {
        $data['error'] = $this->upload->display_errors();
        $this->load->view('exam/admin/index',$data);
    } else {
      $upload_data = array('upload_data' => $this->upload->data());
      // var_dump($upload_data);
      $objReader = PHPExcel_IOFactory::createReader('Excel2007'); //use Excel5 for 2003 format
      $excelpath = 'attach/multi/'.$upload_data['upload_data']['file_name'];
      $objPHPExcel = $objReader->load($excelpath);
      $sheet = $objPHPExcel->getSheet(0);
      $highestRow = $sheet->getHighestRow();           //取得总行数
      // var_dump('ROW');
      // var_dump($highestRow);
      $highestColumn = $sheet->getHighestColumn();     //取得总列数
      // var_dump('columu');
      // var_dump($highestColumn);

      for ($j = 3; $j <= $highestRow; ++$j) {                       //从第二行开始读取数据

          $str = '';

          for ($k = 'A'; $k <= $highestColumn; ++$k) {            //从A列读取数据
               $str .= $objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue().'|*|'; //读取单元格
          }
          $strs = explode('|*|', $str);
          // var_dump($str);
          $sql = array(
              'topic' => $strs[0],
              'Option_A' => $strs[1],
              'Option_B' => $strs[2],
              'Option_C' => $strs[3],
              'Option_D' => $strs[4],
              'Option_E' => $strs[5],
              'Option_F' => $strs[6],
              'Option_G' => $strs[7],
              'Option_H' => $strs[8],
              'anwser'   => $strs[9],
              'fenzhi'   => $strs[10],
              'more'     => $strs[11],
              'short'    => $strs[12]
              );
          // var_dump($sql);
          $flag = 1;
          if (!$this->Exam_model->SetMulti($sql))
          {
            $flag = 0;
          }
          if(!$flag)
          {
            $result = 0;    //插入失败
          }
          var_dump($flag);
      }
    }
  }

  public function ImportTorF()
  {
    $config['upload_path'] = 'attach/TorF';
    $config['allowed_types'] = "xlsx|xls";
    $config['file_ext_tolower'] = true;
    $config['overwrite'] = true;
    $config['max_size']     = 100;
    $config['max_width']        = 1024;
    $config['max_height']       = 768;
    $this->load->helper('form');
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('userfile')) {
        $data['error'] = $this->upload->display_errors();
        $this->load->view('exam/admin/index',$data);
    } else {
        $upload_data = array('upload_data' => $this->upload->data());
        // var_dump($upload_data);
        $objReader = PHPExcel_IOFactory::createReader('Excel2007'); //use Excel5 for 2003 format
        $excelpath = 'attach/TorF/'.$upload_data['upload_data']['file_name'];
        $objPHPExcel = $objReader->load($excelpath);
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();           //取得总行数
        // var_dump('ROW');
        // var_dump($highestRow);
        $highestColumn = $sheet->getHighestColumn();     //取得总列数
        // var_dump('columu');
        // var_dump($highestColumn);

        for ($j = 3; $j <= $highestRow; ++$j) {                       //从第二行开始读取数据

            $str = '';

            for ($k = 'A'; $k <= $highestColumn; ++$k) {            //从A列读取数据
                 $str .= $objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue().'|*|'; //读取单元格
            }
            $strs = explode('|*|', $str);
            // var_dump($str);
            $sql = array(
                'topic' => $strs[0],
                'anwser' => $strs[1],
                'fenzhi' => $strs[2]
                );
            // var_dump($sql);
            $flag = 1;
            if (!$this->Exam_model->SetTorF($sql))
            {
              $flag = 0;
            }
            if(!$flag)
            {
              $result = 0;    //插入失败
            }
        }
    }
  }
  public function ImportShort_answer()
  {
    $config['upload_path'] = 'attach/Short_answer';
    $config['allowed_types'] = "xlsx|xls";
    $config['file_ext_tolower'] = true;
    $config['overwrite'] = true;
    $config['max_size']     = 100;
    $config['max_width']        = 1024;
    $config['max_height']       = 768;
    $this->load->helper('form');
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('userfile')) {
        $data['error'] = $this->upload->display_errors();
        $this->load->view('exam/admin/index',$data);
    } else {
        $upload_data = array('upload_data' => $this->upload->data());
        // var_dump($upload_data);
        $objReader = PHPExcel_IOFactory::createReader('Excel2007'); //use Excel5 for 2003 format
        $excelpath = 'attach/Short_answer/'.$upload_data['upload_data']['file_name'];
        $objPHPExcel = $objReader->load($excelpath);
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();           //取得总行数
        // var_dump('ROW');
        // var_dump($highestRow);
        $highestColumn = $sheet->getHighestColumn();     //取得总列数
        // var_dump('columu');
        // var_dump($highestColumn);

        for ($j = 3; $j <= $highestRow; ++$j) {                       //从第二行开始读取数据

            $str = '';

            for ($k = 'A'; $k <= $highestColumn; ++$k) {            //从A列读取数据
                 $str .= $objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue().'|*|'; //读取单元格
            }
            $strs = explode('|*|', $str);
            // var_dump($str);
            $sql = array(
                'topic' => $strs[0],
                'anwser' => $strs[1],
                'fenzhi' => $strs[2]
                );
            // var_dump($sql);
            $flag = 1;
            if (!$this->Exam_model->SetShort_answer($sql))
            {
              $flag = 0;
            }
            if(!$flag)
            {
              $result = 0;    //插入失败
            }
        }
    }
  }
  public function ImportDiscussion()
  {
    $config['upload_path'] = 'attach/Discussion';
    $config['allowed_types'] = "xlsx|xls";
    $config['file_ext_tolower'] = true;
    $config['overwrite'] = true;
    $config['max_size']     = 100;
    $config['max_width']        = 1024;
    $config['max_height']       = 768;
    $this->load->helper('form');
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('userfile')) {
        $data['error'] = $this->upload->display_errors();
        $this->load->view('exam/admin/index',$data);
    } else {
        $upload_data = array('upload_data' => $this->upload->data());
        // var_dump($upload_data);
        $objReader = PHPExcel_IOFactory::createReader('Excel2007'); //use Excel5 for 2003 format
        $excelpath = 'attach/Discussion/'.$upload_data['upload_data']['file_name'];
        $objPHPExcel = $objReader->load($excelpath);
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();           //取得总行数
        // var_dump('ROW');
        // var_dump($highestRow);
        $highestColumn = $sheet->getHighestColumn();     //取得总列数
        // var_dump('columu');
        // var_dump($highestColumn);

        for ($j = 3; $j <= $highestRow; ++$j) {                       //从第二行开始读取数据

            $str = '';

            for ($k = 'A'; $k <= $highestColumn; ++$k) {            //从A列读取数据
                 $str .= $objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue().'|*|'; //读取单元格
            }
            $strs = explode('|*|', $str);
            // var_dump($str);
            $sql = array(
                'topic' => $strs[0],
                'answer' => $strs[1],
                'fenzhi' => $strs[2]
                );
            // var_dump($sql);
            $flag = 1;
            if (!$this->Exam_model->SetDiscussion($sql))
            {
              $flag = 0;
            }
            if(!$flag)
            {
              $result = 0;    //插入失败
            }
        }
    }
  }
  public function ImportWriting()
  {
    $config['upload_path'] = 'attach/Writing';
    $config['allowed_types'] = "xlsx|xls";
    $config['file_ext_tolower'] = true;
    $config['overwrite'] = true;
    $config['max_size']     = 100;
    $config['max_width']        = 1024;
    $config['max_height']       = 768;
    $this->load->helper('form');
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('userfile')) {
        $data['error'] = $this->upload->display_errors();
        $this->load->view('exam/admin/index',$data);
    } else {
        $upload_data = array('upload_data' => $this->upload->data());
        // var_dump($upload_data);
        $objReader = PHPExcel_IOFactory::createReader('Excel2007'); //use Excel5 for 2003 format
        $excelpath = 'attach/Writing/'.$upload_data['upload_data']['file_name'];
        $objPHPExcel = $objReader->load($excelpath);
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();           //取得总行数
        // var_dump('ROW');
        // var_dump($highestRow);
        $highestColumn = $sheet->getHighestColumn();     //取得总列数
        // var_dump('columu');
        // var_dump($highestColumn);

        for ($j = 3; $j <= $highestRow; ++$j) {                       //从第二行开始读取数据

            $str = '';

            for ($k = 'A'; $k <= $highestColumn; ++$k) {            //从A列读取数据
                 $str .= $objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue().'|*|'; //读取单元格
            }
            $strs = explode('|*|', $str);
            // var_dump($str);
            $sql = array(
                'topic'  => $strs[0],
                'answer' => $strs[1],
                'fenzhi' => $strs[2]
                );
            // var_dump($sql);
            $flag = 1;
            if (!$this->Exam_model->SetWriting($sql))
            {
              $flag = 0;
            }
            if(!$flag)
            {
              $result = 0;    //插入失败
            }
        }
    }
  }

}
