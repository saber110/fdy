
	<script src="<?php echo base_url(); ?>js/notie.js"></script>
	<script>
		function score() {
			notie.confirm('你的此次考试成绩为：<strong>100分！</strong>', 'Yes', 'Cancel', function() {
				notie.alert(1, 'Good choice!', 2);
			});
		}
	</script>

	<script src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"></script>
	<script src="<?php echo base_url(); ?>js/answer.js"></script>
	<script>
		$(function(){
			$("#answer").answerSheet({});
		})
	</script>

</body>
</html>
