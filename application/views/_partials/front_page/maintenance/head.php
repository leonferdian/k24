<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<!--- Basic Page Needs
   ================================================== -->
   <meta charset="utf-8">
	<title><?php echo isset($page_title) ? $page_title : 'Creatie Digiads' ?></title>
   <meta name="description" content="">  
   <meta name="author" content="">

   <!-- Mobile Specific Metas
   ================================================== -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

   <!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="<?php echo site_url('assets/css/base.css'); ?>">
   <link rel="stylesheet" href="<?php echo site_url('assets/css/vendor.css'); ?>">
   <link rel="stylesheet" href="<?php echo site_url('assets/css/main.css'); ?>">    

   <!-- Modernizr
   =================================================== -->
   <script src="<?php echo site_url('assets/js/modernizr.js'); ?>"></script>

   <!-- Favicons
   =================================================== -->
   <link rel="shortcut icon" href="<?php echo site_url('favicon.png'); ?>" >
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