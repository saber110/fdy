	<!-- <script src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"></script> -->
	<script src="http://apps.bdimg.com/libs/jquery/1.8.2/jquery.js"></script>
<!-- share.js -->
<script src="<?php echo base_url(); ?>js/jquery.share.min.js"></script>

	<script src="<?php echo base_url(); ?>js/notie.js"></script>

	<script>
	$("#question").submit(function(e) {

    var url = "Exam/score";

    $.ajax({
           type: "POST",
           url: url,
           data: $("#question").serialize(),
           success: function confirm(data)
           {
				notie.confirm('你的此次考试成绩为：<br/><br/><strong>'+data+'分！</strong>', '分享', 'Cancel');
           },
		   error: function del(){
				notie.alert(3, '出错了，请重新提交.', 2);
			}
         });

    e.preventDefault();
});
</script>
<script src="<?php echo base_url(); ?>js/answer.js"></script>
<script>
	$(function(){
		$("#answer").answerSheet({});
	})
</script>

</body>
</html>
