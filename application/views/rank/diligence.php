<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <h3>勤奋榜</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>易班id</th>
                            <th>姓名</th>
                            <th>学院</th>
                            <th>学习时间(分钟)</th>
                            <th>最高得分</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($lists as $key => $temp) {
                        echo "<tr>";
                        foreach ($temp as $value) {
                          echo "<td>".$value."</td>";
                        }
                        echo "</tr>";
                      }
                      ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
