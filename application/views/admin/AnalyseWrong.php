<div class="row">
  <div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-clock-o fa-fw"></i> 单选
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <ul class="timeline">
              <?php
              $i = 0;
                foreach ($wrong['radio'] as $key => $value) {
                  $i ++;
                  if($i%2 == 0)
                  {
                    echo "<li>";
                  }
                  else
                  {
                    echo "<li class='timeline-inverted'>";
                  }
                  echo '<div class="timeline-badge"><i class="fa fa-check"></i></div>';
                  echo '<div class="timeline-panel"><div class="timeline-heading">';
                  echo '<h4 class="timeline-title">'.$value['topic'].'</h4>';
                  echo '<p><small class="text-muted"><i class="fa fa-clock-o"></i>正确答案:'.$value['anwser'].'</small></p>';
                  echo '<div class="timeline-body">';
                  echo 'A: '.$value['option_A'].'<br \>'.'B: '.$value['option_B'].'<br \>'.'C: '.$value['option_C'].'<br \>'.'D: '.$value['option_D'];
                  echo '</div></div></li>';
                }
              ?>
            </ul>
        </div>
        <!-- /.panel-body -->
    </div>
  </div>
  <div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-clock-o fa-fw"></i> 多选
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <ul class="timeline">
              <?php
              $i = 0;
                foreach ($wrong['multiple'] as $key => $value) {
                  $i ++;
                  if($i%2 == 0)
                  {
                    echo "<li>";
                  }
                  else
                  {
                    echo "<li class='timeline-inverted'>";
                  }
                  echo '<div class="timeline-badge"><i class="fa fa-check"></i></div>';
                  echo '<div class="timeline-panel"><div class="timeline-heading">';
                  echo '<h4 class="timeline-title">'.$value['topic'].'</h4>';
                  echo '<p><small class="text-muted"><i class="fa fa-clock-o"></i>正确答案:'.$value['anwser'].'</small></p>';
                  echo '<div class="timeline-body">';
                  echo 'A: '.$value['option_A'].'<br \>'.'B: '.$value['option_B'].'<br \>'.'C: '.$value['option_C'].'<br \>'.'D: '.$value['option_D'];
                  echo '</div></div></li>';
                }
              ?>
            </ul>
        </div>
        <!-- /.panel-body -->
    </div>
  </div>

</div>
