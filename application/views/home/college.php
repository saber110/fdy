
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>请选择您的学院</title>
    <link rel="stylesheet" href="<?php echo base_url();?>css/framework7.ios.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/framework7.ios.colors.min.css">
  </head>
  <body>

    <div class="views">
      <div class="view view-main">
        <div class="navbar">
          <div class="navbar-inner">
            <div class="left"></div>
            <div class="center sliding">请选择您的学院</div>
            <div class="right"></div>
          </div>
        </div>
        <div class="pages navbar-through">
          <div data-page="home" class="page">
            <div class="page-content">
              <div class="list-block">
                <ul>
                  <li><a href="#" data-page-title="学院" data-back-text="Go back" class="item-link smart-select">

                      <select name="college" id="college" onChange="submitit()">
                        <option value="文学与新闻传播学院" selected>文学与新闻传播学院</option>
                        <option value="外国语学院">外国语学院</option>
                        <option value="建筑与艺术学院">建筑与艺术学院</option>
                        <option value="商学院">商学院</option>
                        <option value="法学院">法学院</option>
                        <option value="马克思主义学院">马克思主义学院</option>
                        <option value="公共管理学院">公共管理学院</option>
			<option value="数学与统计学院">数学与统计学院</option>
                        	<option value="物理与电子学院">物理与电子学院</option>
                        	<option value="化学化工学院">化学化工学院</option>
                        	<option value="机电工程学院">机电工程学院</option>
                        	<option value="能源科学与工程学院">能源科学与工程学院</option>
                        	<option value="材料科学与工程学院">材料科学与工程学院</option>
                        	<option value="粉末冶金研究院">粉末冶金研究院</option>
                        	<option value="交通运输工程学院">交通运输工程学院</option>
                        	<option value="土木工程学院">土木工程学院</option>
                        	<option value="冶金与环境学院">冶金与环境学院</option>
                        	<option value="地球科学与信息物理学院">地球科学与信息物理学院</option>
                        	<option value="资源与安全工程学院">资源与安全工程学院</option>
                        	<option value="资源加工与生物工程学院">资源加工与生物工程学院</option>
                        	<option value="信息科学与工程学院">信息科学与工程学院</option>
			<option value="软件学院">软件学院</option>
                        	<option value="航空航天学院">航空航天学院</option>
                        	<option value="体育教研部">体育教研部</option>
                        	<option value="基础医学院">基础医学院</option>
                        	<option value="湘雅公共卫生学院">湘雅公共卫生学院</option>
                        	<option value="湘雅护理学院">湘雅护理学院</option>
                        	<option value="湘雅口腔医学院">湘雅口腔医学院</option>
                        	<option value="湘雅药学院">湘雅药学院</option>
                        	<option value="生命科学学院">生命科学学院</option>
                        	<option value="爱尔眼科学院">爱尔眼科学院</option>
                      </select>
                      <div class="item-content">
                        <div class="item-inner">
                          <div class="item-title">学院</div>
                        </div>
                      </div></a></li>
                   </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="<?php echo base_url();?>js/framework7.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.8.3.min.js"></script>
<script>
function submitit()
{
  //alert(document.getElementById("college").value);
$.post("<?php echo base_url();?>Exam",{collegeBuild:document.getElementById("college").value},function (result) {
    if(result == 1)
	window.location.assign("<?php echo base_url();?>Exam");
else
 alert(result);
  }

  )
}
</script>
    <script>
      var myApp = new Framework7({
        animateNavBackIcon:true
      }); 
      var mainView = myApp.addView('.view-main', {
        dynamicNavbar: true,
      });
    </script>
  </body>
</html>