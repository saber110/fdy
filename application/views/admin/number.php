<div class="row">
  <div class="col-lg-12">
      <div class="panel panel-default">
          <div class="panel-heading">
              题目数量管理
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
              <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <!-- <?php var_dump($list); ?> -->
                        <?php
                          $num=0;
                          foreach ($list as $temp)
                          {
                              $num++;
                              echo "<tr id=$num>";
                              foreach ($temp as $value) {
                                echo "<td>".$value."</td>";
                              }
                              echo '<td id="E_'.$num.'" onclick="edit('.$num.')">修改<br \></td>';
                              echo "</tr >";
                          }
                         ?>
                  </thead>
              </table>
              <!-- /.table-responsive -->
          </div>
          <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
  </div>
</div>
