<?php
require_once APPPATH."../debug/chromephp/ChromePhp.php";
ChromePhp::log($data);
?>
<!-- Status bar overlay for fullscreen mode-->
    <div class="statusbar-overlay"></div>
    <!-- Panels overlay-->
    <div class="panel-overlay"></div>
    <!-- Left panel with reveal effect-->
    <div class="panel panel-left panel-reveal">
      <div class="content-block">
        <div class="content_img"><img src="<?php echo $userhead;?>" alt=""><span><?php echo $username;?></span></div>
        <div class="home-content">
	      	<ul>
	      		<li><a href="#"><div>个人资料</div></a></li>
	      		<li><a href="#"><div>历史成绩</div></a></li>
	      		<li><a href="<?php echo base_url();?>Rank/Error_Rate"><div>查看错题</div></a></li>
	      	</ul>
          <span><a href="#">退出</a></span>
      </div>
      </div>
    </div>
    <!-- Right panel with cover effect-->
    <div class="panel panel-right panel-cover">
      <div class="content-block">
        <h3>考试成绩信息</h3>
        <div class="home-score">
          <ul>
            <?php foreach ($data['rightsidebar'] as $key => $value){
              echo "<li>";
              $num = $key + 1;
              echo "<p>$num</p>";
              ChromePhp::log("score".$value['score']);
              echo "<p>考试成绩：<span>".$value['score']."分</span></p>";
              echo "<p>所用时间：<span>".$value['sparetime']."分钟</span></p>";
              echo "</li>";
            }?>
          </ul>
        </div>
      </div>
    </div>
    <!-- Views-->
    <div class="views">
      <!-- Your main view, should have "view-main" class-->
      <div class="view view-main">
        <!-- Top Navbar-->
        <div class="navbar">
          <div class="navbar-inner">
            <!-- We have home navbar without left link-->
            <div class="center sliding">辅导员考试学习园地</div>
            <div class="right">
              <!-- Right link contains only icon - additional "icon-only" class--><a href="#" class="link icon-only open-panel"> <i class="icon icon-bars"></i></a>
            </div>
          </div>
        </div>
        <!-- Pages, because we need fixed-through navbar and toolbar, it has additional appropriate classes-->
        <div class="pages navbar-through toolbar-through">
          <!-- Page, data-page contains page name-->
          <div data-page="index" class="page">
            <!-- Scrollable page content-->
            <div class="page-content">
              <div class="content-block-title">考试成绩信息</div>
              <div class="content-block">
                <div class="content-block-inner">
                  <p>最好成绩：<span><?php echo $data['main']['most_score'];?></span></p>
                  <p>考试总时长：<span><?php echo $data['main']['sparetime'];?>分钟</span></p>
                  <p>学习次数：<span><?php echo $data['main']['count'];?>次</span></p>
                </div>
              </div>
              <div class="content-block-title">相关链接</div>
              <div class="list-block">
                <ul>
                  <li><a href="<?php echo base_url();?>Exam/exam" class="external">
                      <div class="item-content">
                        <div class="item-inner">
                          <div class="item-title">开始考试</div>
                        </div>
                      </div></a></li>
                  <li><a href="<?php echo base_url();?>Rank" class="external">
                      <div class="item-content">
                        <div class="item-inner">
                          <div class="item-title">学院、个人排行榜</div>
                        </div>
                      </div></a></li>
                  <li><a href="<?php echo base_url();?>Rank/Diligence_list" class="external">
                      <div class="item-content">
                        <div class="item-inner">
                          <div class="item-title">勤奋榜</div>
                        </div>
                      </div></a></li>
                  <li><a href="<?php echo base_url();?>Rank/Error_Rate" class="external">
                      <div class="item-content">
                        <div class="item-inner">
                          <div class="item-title">错题本</div>
                        </div>
                      </div></a></li>
                </ul>
              </div>
              <div class="content-block-title">查看信息、考试</div>
              <div class="content-block">
                <div class="row">
                  <div class="col-50"><a href="#" data-panel="left" class="button open-panel">个人信息</a></div>
                  <div class="col-50"><a href="#" data-panel="right" class="button open-panel">考试成绩</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Bottom Toolbar-->
        <div class="toolbar">
          <div class="toolbar-inner"><a href="#" class="link">返回</a><a href="#" class="link">退出</a></div>
        </div>
      </div>
    </div>
