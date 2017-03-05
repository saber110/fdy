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
  <?php
    if($type=="设置数量")
    {
      echo "var id = document.getElementsByTagName('input')[1].value;";
      echo "var num1 = document.getElementsByTagName('input')[2].value;";
      echo "var num2 = document.getElementsByTagName('input')[3].value;";
      echo "var num3 = document.getElementsByTagName('input')[4].value;";
      echo '$.post("../Admin/Set",{ id:id,num1:num1,num2:num2,num3:num3},function (result) {
        location.reload(true);
      }
      )';
    }
    else {
      echo "var id = document.getElementsByTagName('input')[1].value;";
      echo "var title = document.getElementsByTagName('input')[2].value;";
      echo "var a = document.getElementsByTagName('input')[3].value;";
      echo "var b = document.getElementsByTagName('input')[4].value;";
      echo "var c = document.getElementsByTagName('input')[5].value;";
      echo "var d = document.getElementsByTagName('input')[6].value;";
      echo "var daan = document.getElementsByTagName('input')[7].value;";
      echo "var fen = document.getElementsByTagName('input')[8].value;";
      echo 'var type = "'.$type.'";';
      echo '$.post("../Edit",{ type: type,id:id,title: title,a:a,b:b,c:c,d:d,daan:daan,fen:fen},function (result) {
        location.reload(true);
      }
      )';
    }
   ?>
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
