
	<script src="<?php echo base_url(); ?>js/notie.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"></script>
	<script>
	$("#question").submit(function(e) {

    var url = "Exam/score";

    $.ajax({
           type: "POST",
           url: url,
           data: $("#question").serialize(),
           success: function(data)
           {
						 notie.confirm('你的此次考试成绩为：<strong>'+data+'分</strong>', 'Yes', 'Cancel', function() {
							notie.alert(1, 'Good Job!', 2);
						});
           },
					 error: function(){
						 notie.confirm('出错了,请重新提交','好的','重试');
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
