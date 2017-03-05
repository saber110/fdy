<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit">	<!-- 360手机优先使用chrome内核 -->
    <meta name="screen-orientation" content="portrait">  <!-- UC强制竖屏 -->
    <meta name="x5-orientation" content="portrait">  <!-- QQ强制竖屏 -->
    <meta name="browsermode" content="application">  <!-- UC浏览器应用模式 -->
    <!--  <meta name="x5-page-mode" content="app">  -->  <!-- QQ应用模式 -->
	<meta http-equiv="Cache-Control" content="no-siteapp"> <!-- 禁止百度转载页面加载流氓广告 -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <!-- 优先使用最高IE内核和chrome内核 -->
	<meta name="viewport" content="width=device-width,maximum-scale=1,initial-scale=1.0,user-scalable=no">  <!-- 禁止用户修改网页大小 -->
	<meta name="google" value="notranslate">  <!-- 禁用google翻译网页 -->
	<meta name="robots" content="index,follow">  <!-- 网页搜索引擎方式 -->
	<title>排行榜</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/Test_bang.css">
</head>
<body>
<form action="">
	<div class="body">
		<header role="banner">
			<nav class="test_nav">
				<ul class="test-switcher" >
					<li><a class="test_xue" href="#0">学院排行榜</a></li>
					<li><a class="test_ge" href="#0">个人排行榜</a></li>
				</ul>
			</nav>
		</header>
		<div class="test_model">
			<div class="content">
				<div id="c-xue" class="c-c">
					<dl>
						<?php
						foreach ($college as $key => $value) {
							$num = $key+1;
							echo "<dd><span>$num</span><p>".$value['college']."</p></dd>";
						}
						 ?>
					</dl>
				</div>
				<div id="c-ge" class="c-c">
					<dl>
						<?php
						foreach ($personal as $key => $value) {
							$num = $key+1;
							echo "<dd><span>$num</span><p>".$value['name']."</p></dd>";
						}
						 ?>
					</dl>
				</div>
			</div>
		</div>
	</div>
	</form>

	<script src="<?php echo base_url(); ?>js/jquery.1.11.1.js"></script>
	<script src="<?php echo base_url(); ?>js/main.js"></script>

	</body>
	</html>
