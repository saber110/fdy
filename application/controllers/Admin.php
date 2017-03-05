<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 后台管理
 */
 class Admin extends CI_Controller
 {

   function __construct()
   {
     parent::__construct();
     $this->load->model('Admin_model');
     $this->load->model('Exam_model');
     $this->load->model('Rank_model');
     $this->load->library('DataOption');
    // 服务器
    $config = array('appID' => 'bd8c29dd94901cfb',
                   'appSecret' => '31106e82b9501d77cbcb985d98dfcd5e',
                    'callback' => 'http://f.yiban.cn/iapp98639', );
     //本地测试
    //$config = array('appID' => '2603163d78712ee3',
    //                    'appSecret' => '1ce9ffc76d284c5dde2a2002feed6c45',
     //                    'callback' => 'http://f.yiban.cn/iapp62933', );

       $this->load->library('YibanSDK', $config, 'yiban');
      //var_dump($this->session->token);
      //$au  = $this->yiban->getAuthorize();
      //var_dump($token);
       if (!$this->input->get('verify_request')) {
           $this->session->url = $_SERVER['REQUEST_URI'];
       }
       //var_dump($this->session);
       if (!isset($this->session->token)) {     // 未获取授权
       /**
        * 从授权服务器回调返回时，URL中带有code（授权码）参数.
        */
         $au = $this->yiban->getAuthorize();
         //var_dump($this->input->post());
         if ($this->input->get('verify_request')) {
             /**
              * 使用授权码（code）获取访问令牌
              * 若获取成功，返回 $info['access_token']
              * 否则查看对应的 msgCN 查看错误信息.
              */
             $info = $this->yiban->getFrameUtil()->perform();
             //var_dump($info);
             if (!isset($info['visit_oauth']['access_token'])) {
                 //echo $info['msgCN'];
                 redirect($au->forwardurl());
             }
             $this->session->token = $info['visit_oauth']['access_token'];
             $this->data['user_info']['yb_userid'] = $info['visit_user']['userid'];
             $this->data['user_info']['yb_username'] = $info['visit_user']['username'];
             header('Location: '.$this->session->url);
         } else {   // 重定向到授权服务器（原sdk使用header()重定向）
             redirect($au->forwardurl());
             // header('Location: ' . $au->forwardurl());
         }
     }
     if (!isset($this->data['user_info']['yb_userhead']) && $this->session->token) {
         $this->user = $this->yiban->getUser($this->session->token);
         $this->data['user_info'] = $this->user->me()['info'];
     }
    //  $data['user_info']['yb_userid']=7041045;
     if($this->Exam_model->Admin($data['user_info']['yb_userid'])==0)
     {
       header("Location: ".base_url()."Exam");
     }
   }
   /**
    * 设置考试的类型以及题目数量
    */
   public function Set($value='num')
   {
     if($value=='type')
     {
       $data['zhi'] = $this->Admin_model->Settype()['type'];
       $this->load->view('admin/header');
       $this->load->view('admin/type',$data);
       $this->load->view('admin/footer');
     }
     else if(empty($this->input->post()))
     {
       $data['list'] = $this->Exam_model->GetNum();
       $data['type'] = "设置数量";  //保证footer正常执行
       $this->load->view('admin/header');
       $this->load->view('admin/number',$data);
       $this->load->view('admin/footer');
     }
     else {
       var_dump($this->input->post());
       $topic  = $this->input->post()['id'];
       $RadioNum  = $this->input->post()['num1'];
       $MultiNum  = $this->input->post()['num2'];
       $TorFNum  = $this->input->post()['num3'];
       $this->Admin_model->Setkaoshi($topic,$RadioNum,$MultiNum,$TorFNum);
     }
   }
   public function Getall($value='radio')
   {
     return $this->Admin_model->Getall($value);
   }
   public function AnalyseCollege($value='')
   {
     $data['all']   = $this->Admin_model->PartCollege();
     if($data['all'][9])
      $i = 0;$chartw='[';
      foreach ($data['all'] as $key => $value) {
        $chartw .= '{'. 'label:'.' "'.$data['all'][$i]['college'].'", data: '.$data['all'][$i]['staff'].'},';
        $i ++;
      }
      $chartw .= ']';
      $chart['chart'] = $chartw;
      $this->load->view('admin/header');
      $this->load->view('admin/AnalyseCollege',$data);
      $this->load->view('admin/flot',$chart);
   }

   public function AnalyseWrong()
   {
    $data['wrong'] = $this->Rank_model->Error_Rate();
    $this->load->view('admin/header');
    $this->load->view('admin/AnalyseWrong',$data);
    $this->load->view('admin/footer');
   }

   public function Delete($type='TorF',$id=10,$Batch_operation=FALSE)
   {
     if($Batch_operation)       //如果是批量操作
     {
       foreach ($id as $value)
       {
         $this->Admin_model->Delete($type,$value);
       }
       $this->Admin_model->Resort($type);
     }
     else
     {
      $result = $this->Admin_model->Delete($type,$id);
      $this->Admin_model->Resort($type);
      return $result;
     }
     $reslut['lists'] = $this->Getall($value);
     $reslut['type'] = $value;
    //  var_dump($reslut['lists']);
     $this->load->view('admin/header');
     $this->load->view('admin/EditDelete',$reslut);
     $this->load->view('admin/footer');
   }

   public function EditDelete($value='radio')
   {
     $result['fileds'] = $this->Admin_model->ExportDataList($value);
     if($value=='radio' || $value=='Multiple' ||$value=='TorF')
        {array_splice($result['fileds'],-3,3);}
      else {
        array_splice($result['fileds'],-1,1);
      }
     $result['lists'] = $this->Getall($value);
     $result['type'] = $value;
    //  var_dump($reslut['lists']);
     $this->load->view('admin/header');
     $this->load->view('admin/EditDelete',$result);
     $this->load->view('admin/footer');
   }
   public function Edit($type='radio',$id=1,$anwser  ="A",
                        $fenzhi  =2,
                        $topic   ="测试",
                        $option_A="测试答案A",
                        $option_B='测试答案B',
                        $option_C='测试答案C',
                        $option_D='测试答案D',
                        $option_E="测试答案E",
                        $option_F='测试答案F',
                        $option_G='测试答案G',
                        $option_H='测试答案H',
                        $more    =0,
                        $short   =2
                        )
   {
     switch ($this->input->post()['type']) {
       case 'radio':
       {
         // var_dump($this->input->post());
          echo $this->Admin_model->Edit($this->input->post()['type'],$this->input->post()['id'],
          $this->input->post()['daan'],$this->input->post()['fen'],$this->input->post()['title'],$this->input->post()['a'],
          $this->input->post()['b'],$this->input->post()['c'],$this->input->post()['d']);
       }
         break;
       case 'multi':
         $this->Admin_model->Edit($type,$id,$anwser,$fenzhi,$option_A,$option_B,$option_C,$option_D,$option_E,$option_F,$option_G,$option_H);
         break;
       case 'TorF':
         $this->Admin_model->Edit($type,$id,$anwser,$fenzhi);
         break;
       case 'Disc':
         $this->Admin_model->Edit($type,$id,$anwser,$fenzhi);
         break;
       case 'Writing':
         $this->Admin_model->Edit($type,$id,$anwser,$fenzhi);
         break;
       default:
         echo "禁止操作";
         break;
     }
   }

   public function index()
   {
     $this->load->view('admin/header');
     $this->load->view('admin/index');
     $this->load->view('admin/footer');
   }

   public function Export()
   {
     $this->load->view('admin/header');
     $this->load->view('admin/export');
     $this->load->view('admin/footer');
   }

   public function ExportData($value='college',$yb_id=7041045)
   {
     $subtitle;
     switch ($value) {
       case 'college':
         {
           $base = 'A';$array_num=0;$data = ($this->Admin_model->ExportDataList($value));
           foreach ($data as $key => $value) {
             $temp[$array_num++] = $base++.'1';
           }
           $subtitle = array_combine(array_values($temp),array_values($data));
           $contents = $this->Admin_model->Statics('college');
         }
         break;
      case 'personal':
        {
          $base = 'A';$array_num=0;$data = ($this->Admin_model->ExportDataList('ex_'.$yb_id));
          foreach ($data as $key => $value) {
            $temp[$array_num++] = $base++.'1';
          }
          $subtitle = array_combine(array_values($temp),array_values($data));
          $contents = $this->Admin_model->Statics('ex_'.$yb_id);
        }
        break;
      case 'all':
      {
        $base = 'A';$array_num=0;$data = ($this->Admin_model->ExportDataList("examination"));
        foreach ($data as $key => $value) {
          $temp[$array_num++] = $base++.'1';
        }
        $subtitle = array_combine(array_values($temp),array_values($data));
        $contents = $this->Admin_model->Statics("examination");
      }
        break;
       default:
         echo "禁止操作";
         break;
     }
    //  var_dump($subtitle);
    // var_dump($this->Admin_model->Statics());
    // exit;
     $this->dataoption->Export('中南大学辅导员考试学习园地',
                             $subtitle,
                             $contents,
                             '中南易班.xls');
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
         $data['link']  = 'ImportRadio';
         $this->load->view('admin/header');
         $this->load->view('admin/import',$data);
         $this->load->view('admin/footer');
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
         $data['link']  = 'ImportMulti';
         $this->load->view('admin/header');
         $this->load->view('admin/import',$data);
         $this->load->view('admin/footer');
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
         $data['link']  = 'ImportTorF';
         $this->load->view('admin/header');
         $this->load->view('admin/import',$data);
         $this->load->view('admin/footer');
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
         $data['link']  = 'ImportShort_answer';
         $this->load->view('admin/header');
         $this->load->view('admin/import',$data);
         $this->load->view('admin/footer');
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
         $data['link']  = 'ImportDiscussion';
         $this->load->view('admin/header');
         $this->load->view('admin/import',$data);
         $this->load->view('admin/footer');
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
                 'anwser' => $strs[1],
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
         $data['link']  = 'ImportWriting';
         $this->load->view('admin/header');
         $this->load->view('admin/import',$data);
         $this->load->view('admin/footer');
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
                 'anwser' => $strs[1],
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
