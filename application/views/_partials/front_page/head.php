<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="icon" href="<?php echo site_url('favicon.png') ?>" sizes="192x192" />
	<title><?php echo isset($page_title) ? $page_title : 'Creative E-Commerce' ?></title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo site_url('assets/front/css/bootstrap.min.css'); ?>">

    <!-- Slick -->
    <link rel="stylesheet" href="<?php echo site_url('assets/front/css/slick.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/front/css/slick-theme.css'); ?>">

    <!-- nouislider -->
    <link rel="stylesheet" href="<?php echo site_url('assets/front/css/nouislider.min.css'); ?>">

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="<?php echo site_url('assets/front/css/font-awesome.min.css'); ?>">

    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="<?php echo site_url('assets/front/css/style.css'); ?>">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>

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
  <?php
    global $body_class;
    $low_title = strtolower($page_title);
    if ($low_title == 'login')
    {
        $body_class = 'bg-dark';
    }
  ?>
  <body class="<?php echo $body_class; ?>">