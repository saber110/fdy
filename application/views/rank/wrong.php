<div class="row">
  <div class="col-lg-6">
      <div class="panel panel-default">
          <div class="panel-heading">
              单选
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs">
                  <li class="active"><a href="#radio1" data-toggle="tab">1</a>
                  </li>
                  <li><a href="#radio2" data-toggle="tab">2</a>
                  </li>
                  <li><a href="#radio3" data-toggle="tab">3</a>
                  </li>
                  <li><a href="#radio4" data-toggle="tab">4</a>
                  </li>
                  <li><a href="#radio5" data-toggle="tab">5</a>
                  </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <?php
                $id=1;
                  foreach ($wrong['radio'] as $key => $value) {
                    if($id==1)
                    {
                      echo "<div class='tab-pane fade in active' id=radio$id>";
                    }
                    else {
                      echo "<div class='tab-pane fade' id=radio$id>";
                    }
                    echo '<p>'.$value['topic'].'</p>';
                    echo '<h4>正确答案:'.$value['anwser'].'</h4>';
                    echo '<p>A: '.$value['option_A'].'<br \>'.'B: '.$value['option_B'].'<br \>'.'C: '.$value['option_C'].'<br \>'.'D: '.$value['option_D'];
                    echo '</p></div>';
                    $id ++;
                  }
                ?>
              </div>
          </div>
          <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
  </div>
  <div class="col-lg-6">
      <div class="panel panel-default">
          <div class="panel-heading">
              多选
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs">
                  <li class="active"><a href="#multiple1" data-toggle="tab">1</a>
                  </li>
                  <li><a href="#multiple2" data-toggle="tab">2</a>
                  </li>
                  <li><a href="#multiple3" data-toggle="tab">3</a>
                  </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <?php
                $id=1;
                  foreach ($wrong['multiple'] as $key => $value) {
                    if($id==1)
                    {
                      echo "<div class='tab-pane fade in active' id=multiple$id>";
                    }
                    else {
                      echo "<div class='tab-pane fade' id=multiple$id>";
                    }
                    echo '<p>'.$value['topic'].'</p>';
                    echo '<h4>正确答案:'.$value['anwser'].'</h4>';
                    echo '<p>A: '.$value['option_A'].'<br \>'.'B: '.$value['option_B'].'<br \>'.'C: '.$value['option_C'].'<br \>'.'D: '.$value['option_D'];
                    echo '</p></div>';
                    $id ++;
                  }
                ?>
              </div>
          </div>
          <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
  </div>
  </div>
</div>
