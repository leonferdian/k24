
		<!-- Vendor -->
		<script src="<?php echo site_url('assets/vendor/jquery/jquery.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/bootstrap/js/bootstrap.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/nanoscroller/nanoscroller.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/magnific-popup/magnific-popup.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/jquery-placeholder/jquery.placeholder.js'); ?>"></script>
		
		<!-- Specific Page Vendor -->
		<script src="<?php echo site_url('assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/jquery-appear/jquery.appear.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/jquery-easypiechart/jquery.easypiechart.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/flot/jquery.flot.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/flot-tooltip/jquery.flot.tooltip.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/flot/jquery.flot.pie.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/flot/jquery.flot.categories.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/flot/jquery.flot.resize.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/jquery-sparkline/jquery.sparkline.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/raphael/raphael.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/morris/morris.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/gauge/gauge.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/snap-svg/snap.svg.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/liquid-meter/liquid.meter.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/jqvmap/jquery.vmap.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/jqvmap/data/jquery.vmap.sampledata.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/jqvmap/maps/jquery.vmap.world.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/select2/select2.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js'); ?>"></script>
		<script src="<?php echo site_url('assets/javascripts/tables/examples.datatables.default.js'); ?>"></script>
		<script src="<?php echo site_url('assets/javascripts/tables/examples.datatables.row.with.details.js'); ?>"></script>
		<script src="<?php echo site_url('assets/javascripts/tables/examples.datatables.tabletools.js'); ?>"></script>
		<script src="<?php echo site_url('assets/javascripts/tables/examples.datatables.ajax.js'); ?>"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo site_url('assets/javascripts/theme.js'); ?>"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo site_url('assets/javascripts/theme.custom.js'); ?>"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo site_url('assets/javascripts/theme.init.js'); ?>"></script>


		<!-- Examples -->
		<script src="<?php echo site_url('assets/javascripts/dashboard/examples.dashboard.js'); ?>"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>

		<script src="<?php echo site_url('assets/plugins/moment.min.js');?>"></script>
    	<script src="<?php echo site_url('assets/plugins/daterangepicker/daterangepicker.js');?>"></script>

		<script src="<?php echo site_url('assets/js/back_page.js'); ?>"></script>
    
    <?php
        if (isset($js['foot']))
        {
            foreach ($js['foot'] as $url)
            {
                echo "<script src='$url'></script>".PHP_EOL;
            }
        }
    ?>
  </body>
</html>
<!-- // Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?> -->