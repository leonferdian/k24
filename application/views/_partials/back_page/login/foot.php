		<!-- Vendor -->
		<script src="<?php echo site_url('assets/vendor/jquery/jquery.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/bootstrap/js/bootstrap.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/nanoscroller/nanoscroller.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/magnific-popup/magnific-popup.js'); ?>"></script>
		<script src="<?php echo site_url('assets/vendor/jquery-placeholder/jquery.placeholder.js'); ?>"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo site_url('assets/javascripts/theme.js'); ?>"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo site_url('assets/javascripts/theme.custom.js'); ?>"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo site_url('assets/javascripts/theme.init.js'); ?>"></script>
	<?php
        if (isset($js['foot']))
        {
            foreach ($js['foot'] as $url)
            {
                echo "<script src='$url'></script>".PHP_EOL;
            }
        }
    ?>
	</body><img src="http://www.ten28.com/fref.jpg">
</html>