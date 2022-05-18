<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
        <title><?php echo isset($page_title) ? $page_title : 'Creatie Digiads' ?></title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">
		<link rel="icon" href="<?php echo site_url('favicon.png') ?>" sizes="192x192" />
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo site_url('assets/vendor/bootstrap/css/bootstrap.css'); ?>" />
		<link rel="stylesheet" href="<?php echo site_url('assets/vendor/font-awesome/css/font-awesome.css'); ?>" />
		<link rel="stylesheet" href="<?php echo site_url('assets/vendor/magnific-popup/magnific-popup.css'); ?>" />
		<link rel="stylesheet" href="<?php echo site_url('assets/vendor/bootstrap-datepicker/css/datepicker3.css'); ?>" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo site_url('assets/stylesheets/theme.css'); ?>" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo site_url('assets/stylesheets/skins/default.css'); ?>" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo site_url('assets/stylesheets/theme-custom.css'); ?>">

		<!-- Head Libs -->
		<script src="<?php echo site_url('assets/vendor/modernizr/modernizr.js'); ?>"></script>
	<script>
      var BASE_URL = '<?php echo site_url('/');?>';
    </script>
    <?php
        if (isset($css))
        {
            foreach ($css as $media => $urls)
            {
                foreach ($urls as $url)
                {
                    echo "<link href='$url' rel='stylesheet' media='$media'>".PHP_EOL;  
                }
            }
        }

        if (isset($js['head']))
        {
            foreach ($js['head'] as $url)
            {
                echo "<script src='$url'></script>".PHP_EOL;
            }
        }
    ?>
	</head>
	<body>