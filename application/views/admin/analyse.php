<div class="row">
  <div class="col-lg-6">
      <div class="panel panel-default">
          <div class="panel-heading">
              学院参与情况(前十)
          </div>
          <div id="flotcontainer" style="width: 450px; height: 450px;"></div>
      </div>
  </div>
  <div class="col-lg-6">
      <div class="panel panel-default">
          <div class="panel-heading">
              全部学院参与度
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
              <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                      <tr>
                          <th>序号</th>
                          <th>学院</th>
                          <th>参与人数</th>
                          <th>最高得分</th>
                          <th>考试总次数</th>
                          <th>备注</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($all as $key => $temp) {
                        echo "<tr>";
                        foreach ($temp as $key => $value) {
                          echo '<td>'.$value.'</td>';
                        }
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
