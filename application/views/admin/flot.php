</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
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
<script type="text/javascript">
$(function () {
    var data = <?php echo $chart?>;
    console.log(data);
    var options = {
      series: {
        pie: {
            show: true,
            radius: 1,
            label: {
                show: true,
                radius: 3/4,
                formatter: labelFormatter,
                background: {
                    opacity: 0.5,
                    color: '#000'
                }
            }
        }
    },
    legend: {
        show: false
    },
    grid: {
        hoverable: true
    }
   };

    $.plot($("#flotcontainer"), data, options);
});
function labelFormatter(label, series) {
  return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
}
</script>

</body>

</html>
