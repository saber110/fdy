<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>考试</title>
  </head>
  <body>
    <form method="post" action='./Exam/score'>
      <?php
      if(!empty($list['radio'])) {
        $num = 0;
        foreach ($list['radio'] as $key) {
          foreach ($key as $value) {
            // var_dump($value);
            $num ++;
            echo $num.' '.$value['topic']."<br \>";
            echo '<input type="radio" class = "radio" id = "myradio'.$num.'" name="myradio'.$value['id'].'" value="A" />'.$value['option_A']."<br \>";
            echo '<input type="radio" class = "radio" id = "myradio'.$num.'" name="myradio'.$value['id'].'" value="B" />'.$value['option_B']."<br \>";
            echo '<input type="radio" class = "radio" id = "myradio'.$num.'" name="myradio'.$value['id'].'" value="C" />'.$value['option_C']."<br \>";
            echo '<input type="radio" class = "radio" id = "myradio'.$num.'" name="myradio'.$value['id'].'" value="D" />'.$value['option_D']."<br \>";

          }
        }
      }
      if (!empty($list['multi'])) {
        $num = 0;
        foreach ($list['multi'] as $key) {
          foreach ($key as $value) {
            // var_dump($value);
            $num ++;
            echo $num.' '.$value['topic']."<br \>";
            echo '<input type="checkbox" class = "checkbox" id = "mycheckbox'.$num.'" name="mycheckbox'.$value['id'].'[]" value="A" />'.$value['option_A']."<br \>";
            echo '<input type="checkbox" class = "checkbox" id = "mycheckbox'.$num.'" name="mycheckbox'.$value['id'].'[]" value="B" />'.$value['option_B']."<br \>";
            echo '<input type="checkbox" class = "checkbox" id = "mycheckbox'.$num.'" name="mycheckbox'.$value['id'].'[]" value="C" />'.$value['option_C']."<br \>";
            echo '<input type="checkbox" class = "checkbox" id = "mycheckbox'.$num.'" name="mycheckbox'.$value['id'].'[]" value="D" />'.$value['option_D']."<br \>";
            echo '<input type="checkbox" class = "checkbox" id = "mycheckbox'.$num.'" name="mycheckbox'.$value['id'].'[]" value="E" />'.$value['option_E']."<br \>";
            echo '<input type="checkbox" class = "checkbox" id = "mycheckbox'.$num.'" name="mycheckbox'.$value['id'].'[]" value="F" />'.$value['option_F']."<br \>";
            echo '<input type="checkbox" class = "checkbox" id = "mycheckbox'.$num.'" name="mycheckbox'.$value['id'].'[]" value="G" />'.$value['option_G']."<br \>";
            echo '<input type="checkbox" class = "checkbox" id = "mycheckbox'.$num.'" name="mycheckbox'.$value['id'].'[]" value="H" />'.$value['option_H']."<br \>";
          }
        }
      }
      if (!empty($list['TorF'])) {
        $num = 0;
        foreach ($list['TorF'] as $key) {
          foreach ($key as $value) {
            // var_dump($value);
            $num ++;
            echo $value['topic']."<br \>"."<br \>";
            echo '<input type="radio" class = "TorF" id = "myTorF'.$num.'" name="myTorF'.$value['id'].'" value="1" />'."正确"."<br \>";
            echo '<input type="radio" class = "TorF" id = "myTorF'.$num.'" name="myTorF'.$value['id'].'" value="0" />'."错误"."<br \>";

          }
        }
      }

      // foreach ($list['short'] as $key) {
      //   foreach ($key as $value) {
      //       echo $value."<br />";
      //   }
      // }
      // foreach ($list['disc'] as $key) {
      //   foreach ($key as $value) {
      //       echo $value."<br />";
      //   }
      // }
      // foreach ($list['writ'] as $key) {
      //   foreach ($key as $value) {
      //       echo $value."<br />";
      //   }
      // }
      // print_r($list);
      ?>
      <input type="submit" value="提交">
    </form>

  </body>
</html>
