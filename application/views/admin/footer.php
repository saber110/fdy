</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<script type="text/javascript">
function edit(status){
  var old = document.getElementById(status).innerHTML;
  old = old.replace(/\<td>/g,'<td><input type ="text" value="');
  old = old.replace(/\<\/td>/g,'"/></td>');
  $("#"+status).html(old);
  document.getElementById('E_'+status).onclick=null
  document.getElementById('E_'+status).onclick=function(){
    submit(status);
  };
  document.getElementById('E_'+status).innerHTML = '确认修改';
}
function  submit(status)
{
  var id = document.getElementsByTagName('input')[1].value;
  var title = document.getElementsByTagName('input')[2].value;
  var a = document.getElementsByTagName('input')[3].value;
  var b = document.getElementsByTagName('input')[4].value;
  var c = document.getElementsByTagName('input')[5].value;
  var d = document.getElementsByTagName('input')[6].value;
  var daan = document.getElementsByTagName('input')[7].value;
  var fen = document.getElementsByTagName('input')[8].value;
  var type = "<?php echo $type; ?>";
  $.post("Edit",{ type: type,id:id,title: title,a:a,b:b,c:c,d:d,daan:daan,fen:fen},function (result) {
    location.reload(true);
  }
  )
  // var jsonds = {};
  // var jsond = {};
  // jsond["title"] = title;
  // jsond["a"]     = a;
  // jsond["b"]     = b;
  // jsond["c"]     = c;
  // jsond["d"]     = d;
  // jsond["daan"]  = daan;
  // jsond["fen"]   = fen;
  // jsonds.push(jsond);
  // var jsonString = JSON.stringify(jsonds);
  // console.log(jsonString);
  // $.get("Edit/radio/"+status+"/"+daan+"/"+fen+"/"+(a)+"/"+b+"/"+c+"/"+d, function(data){
  //   alert(data);
	// 	// ret = $.parseJSON(data);
	// 	// $deal_id = ret.status;
	// 	// if(ret.msg != 1)
	// 	// $("#"+$deal_id).html('是');
	// 	// else
	// 	// 	alert("更新失败，请重试");
	// })
}
</script>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>js/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php echo base_url(); ?>js/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>js/morris.min.js"></script>
<script src="<?php echo base_url(); ?>js/morris-data.js"></script>
<!-- Flot Charts JavaScript -->
<script src="<?php echo base_url(); ?>js/excanvas.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.flot.pie.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.flot.resize.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.flot.time.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo base_url(); ?>js/flot-data.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>js/sb-admin-2.js"></script>
<!-- Javascript for statics (analyse.php)-->
</body>

</html>
