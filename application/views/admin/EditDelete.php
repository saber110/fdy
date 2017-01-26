<div class="row">
  <div class="col-lg-12">
      <div class="panel panel-default">
          <div class="panel-heading">
              单选管理
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
              <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <!-- <?php var_dump($fileds); ?> -->
                      <tr >
                        <?php
                          foreach ($fileds as $value) {
                            echo "<th>".$value."</th>";
                          }
                         ?>
                          <th>操作</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($lists as $key => $temp) {
                        echo "<tr id =".$temp['id'].">";
                        foreach ($temp as $key => $value) {
                          echo '<td>'.$value.'</td>';
                        }
                        echo '<td id="E_'.$temp['id'].'" onclick="edit('.$temp['id'].')">修改<br \><a href ="'.site_url().'Admin/Delete/'.$type.'/'.$temp["id"].'">删除</a></td>';
                        echo "</tr>";
                      }
                    ?>
                  </tbody>
              </table>
              <!-- /.table-responsive -->
          </div>
          <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
  </div>
</div>
