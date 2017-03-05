<form method="post" id = "question">
	<div class="wrapper">
	<div id="answer" class="card_wrap">

		<?php
		if($type != "复赛")
		{
			if(!empty($list['radio'])) {
				$num = 0;
				foreach ($list['radio'] as $key) {
					foreach ($key as $value) {
						// var_dump($value);
						$num ++;
						echo '<div class="card_cont card'.$num.'">';
						echo "<div class='card'>";
						echo "<p class='question'>"."<span>Q$num </span>".$value['topic']."</p>";
						echo "<ul class='select'>";
						echo '<li>'.'<input id="q'.$num.'_1" type="radio" value="A" name="myradio'.$value["id"].'">'.'<label for="q'.$num.'_1">'.$value['option_A']."</label></li>";
						echo '<li>'.'<input id="q'.$num.'_2" type="radio" value="B" name="myradio'.$value["id"].'">'.'<label for="q'.$num.'_2">'.$value['option_B']."</label></li>";
						echo '<li>'.'<input id="q'.$num.'_3" type="radio" value="C" name="myradio'.$value["id"].'">'.'<label for="q'.$num.'_3">'.$value['option_C']."</label></li>";
						echo '<li>'.'<input id="q'.$num.'_4" type="radio" value="D" name="myradio'.$value["id"].'">'.'<label for="q'.$num.'_4">'.$value['option_D']."</label></li>";
						echo "</ul>";
						if($num == 1)
						{
							echo "<div class='card_bottom'><span><b>$num</b>/$number</span></div>";
						}
						else
						{
							echo "<div class='card_bottom'><a class='prev'>上一题</a><span><b>$num</b>/$number</span></div>";
						}
						echo "</div>";
						echo "</div>";
					}
				}

			}
			if(!empty($list['multi'])) {
				foreach ($list['multi'] as $key) {
					foreach ($key as $value) {
						// var_dump($value);
						$num ++;
						echo '<div class="card_cont card'.$num.'">';
						echo "<div class='card'>";
						echo "<p class='question'>"."<span>Q$num </span>".$value['topic']."</p>";
						echo "<ul class='select'>";
						echo '<li>'.'<div class="squared">'.'<input type="checkbox" id="q'.$num.'_1" value="A" name="mycheckbox'.$value["id"].'[]">'.'<label for="q'.$num.'_1"></label><p>'.$value['option_A']."</p></div></li>";
						echo '<li>'.'<div class="squared">'.'<input type="checkbox" id="q'.$num.'_2" value="B" name="mycheckbox'.$value["id"].'[]">'.'<label for="q'.$num.'_2"></label><p>'.$value['option_B']."</p></div></li>";
						echo '<li>'.'<div class="squared">'.'<input type="checkbox" id="q'.$num.'_3" value="C" name="mycheckbox'.$value["id"].'[]">'.'<label for="q'.$num.'_3"></label><p>'.$value['option_C']."</p></div></li>";
						echo '<li>'.'<div class="squared">'.'<input type="checkbox" id="q'.$num.'_4" value="D" name="mycheckbox'.$value["id"].'[]">'.'<label for="q'.$num.'_4"></label><p>'.$value['option_D']."</p></div></li>";
						if(!empty($value['option_E']))
							echo '<li>'.'<div class="squared">'.'<input type="checkbox" id="q'.$num.'_5" value="D" name="mycheckbox'.$value["id"].'[]">'.'<label for="q'.$num.'_5"></label><p>'.$value['option_E']."</p></div></li>";
						if(!empty($value['option_F']))
							echo '<li>'.'<div class="squared">'.'<input type="checkbox" id="q'.$num.'_6" value="D" name="mycheckbox'.$value["id"].'[]">'.'<label for="q'.$num.'_6"></label><p>'.$value['option_F']."</p></div></li>";
						if(!empty($value['option_G']))
							echo '<li>'.'<div class="squared">'.'<input type="checkbox" id="q'.$num.'_7" value="D" name="mycheckbox'.$value["id"].'[]">'.'<label for="q'.$num.'_7"></label><p>'.$value['option_G']."</p></div></li>";

						echo "</ul>";
						echo "<div class='card_bottom'><a class='prev'>上一题</a><span><a class='next'>下一题</a><b>$num</b>/$number</span></div>";
						echo "</div>";
						echo "</div>";
					}
				}

			}
			if(!empty($list['TorF'])) {
				foreach ($list['TorF'] as $key) {
					foreach ($key as $value) {
						// var_dump($value);
						$num ++;
						echo '<div class="card_cont card'.$num.'">';
						echo "<div class='card'>";
						echo "<p class='question'>"."<span>Q$num </span>填空题</p>";
						echo "<ul class='select'>";
						echo '<li>'.$value['topic'].'</li><br><br><br><br><br>';
						echo '<li><input type="text" placeholder="填空答案" name="myblank"></li>';
						//'.'<input id="q'.$num.'_1" type="checkbox" value="A" name="myradio'.$value["id"].'">'.'<label for="q'.$num.'_1">'.$value['option_A']."</label>
						echo "</ul>";
						echo "<div class='card_bottom'><a class='prev'>上一题</a><span><a class='next'>下一题</a><b>$num</b>/$number</span></div>";
						echo "</div>";
						echo "</div>";
					}
				}

			}
			if(!empty($list['short'])) {
				foreach ($list['short'] as $value) {		//若多个题目,则将value改为key
					 {
						// var_dump($value);
						$num ++;
						echo '<div class="card_cont card'.$num.'">';
						echo "<div class='card'>";
						echo "<p class='question'>"."<span>Q$num </span>简答题</p>";
						echo "<ul class='select'>";
						echo '<li>'.$value['topic'].'</li><br><br><br><br><br>';
						//'.'<input id="q'.$num.'_1" type="checkbox" value="A" name="myradio'.$value["id"].'">'.'<label for="q'.$num.'_1">'.$value['option_A']."</label>
						echo "</ul>";
						echo "<div class='card_bottom'><a class='prev'>上一题</a><span><a class='next'>下一题</a><b>$num</b>/$number</span></div>";
						echo "</div>";
						echo "</div>";
					}
				}

			}
			if(!empty($list['disc'])) {
				foreach ($list['disc'] as $value) {		//若多个题目,则将value改为key
					 {
						// var_dump($value);
						$num ++;
						echo '<div class="card_cont card'.$num.'">';
						echo "<div class='card'>";
						echo "<p class='question'>"."<span>Q$num </span>论述题</p>";
						echo "<ul class='select'>";
						echo '<li>'.$value['topic'].'</li><br><br><br><br><br>';
						echo "</ul>";
						echo "<div class='card_bottom'><a class='prev'>上一题</a><span><a class='next'>下一题</a><b>$num</b>/$number</span></div>";
						echo "</div>";
						echo "</div>";
					}
				}

			}
			if(!empty($list['writ'])) {
				foreach ($list['writ'] as $value) {			//若多个题目,则将value改为key
					 {
						// var_dump($value);
						$num ++;
						echo '<div class="card_cont card'.$num.'">';
						echo "<div class='card'>";
						echo "<p class='question'>"."<span>Q$num </span>写作题</p>";
						echo "<ul class='select'>";
						echo '<li>'.$value['topic'].'</li><br><br><br><br><br>';
						echo '<li><p id="submit1" align="center"><button class="test_a">交卷</button></p></li>';
						echo "</ul>";
						echo "<div class='card_bottom'><a class='prev'>上一题</a><span><a class='next'>下一题</a><b>$num</b>/$number</span></div>";
						echo "</div>";
						echo "</div>";
					}
				}

			}
		}
		else
		{
			$num = 0;
			if(!empty($list['radio'])) {
				foreach ($list['radio'] as $key) {
					foreach ($key as $value) {
						// var_dump($value);
						$num ++;
						echo '<div class="card_cont card'.$num.'">';
						echo "<div class='card'>";
						echo "<p class='question'>"."<span>Q$num </span>填空题</p>";
						echo "<ul class='select'>";
						echo '<li>'.$value['topic'].'</li><br><br><br><br><br>';
						echo '<li><input type="text" placeholder="填空答案" name="myblank'.$num.'"></li>';
						echo "</ul>";
						echo "<div class='card_bottom'><a class='prev'>上一题</a><span><a class='next'>下一题</a><b>$num</b>/$number</span></div>";
						echo "</div>";
						echo "</div>";
					}
				}
			}
			if(!empty($list['multi'])) {
				foreach ($list['multi'] as $key) {
					foreach ($key as $value) {
						// var_dump($value);
						$num ++;
						echo '<div class="card_cont card'.$num.'">';
						echo "<div class='card'>";
						echo "<p class='question'>"."<span>Q$num </span>".$value['topic']."</p>";
						echo "<ul class='select'>";
						echo '<li>'.'<div class="squared">'.'<input type="checkbox" id="q'.$num.'_1" value="A" name="mycheckbox'.$value["id"].'[]">'.'<label for="q'.$num.'_1"></label><p>'.$value['option_A']."</p></div></li>";
						echo '<li>'.'<div class="squared">'.'<input type="checkbox" id="q'.$num.'_2" value="B" name="mycheckbox'.$value["id"].'[]">'.'<label for="q'.$num.'_2"></label><p>'.$value['option_B']."</p></div></li>";
						echo '<li>'.'<div class="squared">'.'<input type="checkbox" id="q'.$num.'_3" value="C" name="mycheckbox'.$value["id"].'[]">'.'<label for="q'.$num.'_3"></label><p>'.$value['option_C']."</p></div></li>";
						echo '<li>'.'<div class="squared">'.'<input type="checkbox" id="q'.$num.'_4" value="D" name="mycheckbox'.$value["id"].'[]">'.'<label for="q'.$num.'_4"></label><p>'.$value['option_D']."</p></div></li>";
						if(!empty($value['option_E']))
							echo '<li>'.'<div class="squared">'.'<input type="checkbox" id="q'.$num.'_5" value="D" name="mycheckbox'.$value["id"].'[]">'.'<label for="q'.$num.'_5"></label><p>'.$value['option_E']."</p></div></li>";
						if(!empty($value['option_F']))
							echo '<li>'.'<div class="squared">'.'<input type="checkbox" id="q'.$num.'_6" value="D" name="mycheckbox'.$value["id"].'[]">'.'<label for="q'.$num.'_6"></label><p>'.$value['option_F']."</p></div></li>";
						if(!empty($value['option_G']))
							echo '<li>'.'<div class="squared">'.'<input type="checkbox" id="q'.$num.'_7" value="D" name="mycheckbox'.$value["id"].'[]">'.'<label for="q'.$num.'_7"></label><p>'.$value['option_G']."</p></div></li>";

						echo "</ul>";
						echo "<div class='card_bottom'><a class='prev'>上一题</a><span><a class='next'>下一题</a><b>$num</b>/$number</span></div>";
						echo "</div>";
						echo "</div>";
					}
				}
			}
			if(!empty($list['TorF'])) {
				foreach ($list['TorF'] as $key) {
					foreach ($key as $value) {
						// var_dump($value);
						$num ++;
						echo '<div class="card_cont card'.$num.'">';
						echo "<div class='card'>";
						echo "<p class='question'>"."<span>Q$num </span>判断</p>";
						echo "<ul class='select'>";
						echo '<li>'.$value['topic'].'</li><br><br><br><br><br>';
						echo '<li>'.'<input id="q'.$num.'_1" type="radio" value="对" name="mypanduan'.$value["id"].'">'.'<label for="q'.$num.'_1">'."正确"."</label></li>";
						echo '<li>'.'<input id="q'.$num.'_2" type="radio" value="错" name="mypanduan'.$value["id"].'">'.'<label for="q'.$num.'_2">'."错误"."</label></li>";
						echo "<div class='card_bottom'><a class='prev'>上一题</a><span><a class='next'>下一题</a><b>$num</b>/$number</span></div>";
						echo "</div>";
						echo "</div>";
					}
				}
			}
			echo '<div class="card_cont card'.$num.'">';
			echo "<div class='card'>";
			echo "<p class='question'>";
			echo "<ul class='select'>";
			echo "<li></li><li></li><li></li>";
			echo '<li><p id="submit" align="center"><button class="test_a">交卷</button></p></li>';
			echo "</div>";
			echo "</div>";
		}
		?>
	</div><!--/card_wrap-->

	<!--  分享页面  -->
	<div class="social-share" data-initialized="true">
	<div class="hw-overlay" id="hw-layer">
		<div class="hw-layer-wrap">
			<h6><img src="<?php echo base_url()?>images/test_fx.png" alt=""><span>分享到	</span></h6>
			<div class="test_bottom">
				<ul>
					<li><div class="social-share" data-sites="weibo"></div></li>
					<li><div class="social-share" data-sites="qq"></div></li>
					<li><div class="social-share" data-sites="qzone"></div></li>
					<li><div class="social-share" data-sites="tencent"></div></li>
					<li><div class="social-share" data-sites="wechat"></div></li>
				</ul>
			</div>
		</div>
	</div>
</div>
</div>
</form>
