	<!-- <script src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"></script> -->
	<div class="footer_time">
		<p>已用时间：<span id="time"><strong>0</strong></span><strong>分钟，</strong>总共<span><strong>30分钟</strong></span></p>
	</div>
	<script src="http://apps.bdimg.com/libs/jquery/1.8.2/jquery.js"></script>
<!-- share.js -->
	<script src="<?php echo base_url(); ?>js/jquery.share.min.js"></script>
	<script src="<?php echo base_url(); ?>js/notie.js"></script>
	<script>
	var f=setInterval('timer()',60000);
	$("#question").submit(function(e) {

    var f = "<?php echo base_url()?>Exam/score";

    $.ajax({
           type: "POST",
           url: url,
           data: $("#question").serialize(),
           success: function confirm(data)
           {
						 notie.confirm('你的此次考试成绩为：<br/><br/><strong>'+data+'分！</strong>', '分享', 'Cancel');
						 window.clearInterval(f);
           },
		   error: function del(){
				notie.alert(3, '出错了，请重新提交.', 2);
			}
         });

    e.preventDefault();
		$("#submit1").hide();
});
</script>
<script type="text/javascript">
	 function timer()
	 {
			$.get("<?php echo base_url(); ?>Exam/timer",function(data)
			{
				if(data >= 30)
				{
					{

				    var url = "<?php echo base_url()?>Exam/score";

				    $.ajax({
				           type: "POST",
				           url: url,
				           data: $("#question").serialize(),
				           success: function confirm(data)
				           {
										 notie.confirm('你的此次考试成绩为：<br/><br/><strong>'+data+'分！</strong>', '分享', 'Cancel');
										 window.clearInterval(f);
				           },
						   error: function del(){
								notie.alert(3, '出错了，请重新提交.', 2);
							}
				         });
							$("#submit1").hide();
					}
				}
				$("#time").html(data);
			})
	 }
</script>
<script src="<?php echo base_url(); ?>js/answer.js"></script>
<script>
	$(function(){
		$("#answer").answerSheet({});
	})
</script>

</body>
</html>
