<form method="post" action='./Exam/score'>
	<div class="wrapper">
	<div id="answer" class="card_wrap">
		<?php
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
		?>
	</div><!--/card_wrap-->
</div>
<input type="submit" value="提交">
</form>
