<!doctype html>
<html class="fixed">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title><?php echo $page_title ?></title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/bootstrap/css/bootstrap.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/font-awesome/css/font-awesome.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/magnific-popup/magnific-popup.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/bootstrap-datepicker/css/datepicker3.css'); ?>" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/select2/select2.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css'); ?>" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo site_url('assets/stylesheets/theme.css'); ?>" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?php echo site_url('assets/stylesheets/skins/default.css'); ?>" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo site_url('assets/stylesheets/theme-custom.css'); ?>">

    <!-- Head Libs -->
    <script src="<?php echo site_url('assets/vendor/modernizr/modernizr.js'); ?>"></script>

</head>

<body>
    <section class="body">

        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <!-- <a href="../" class="logo">
						<img src="assets/images/logo.png" height="35" alt="Porto Admin" />
					</a> -->
                <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <!-- start: search & user box -->
            <div class="header-right">

                <!-- <form action="pages-search-results.html" class="search nav-form">
						<div class="input-group input-search">
							<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form> -->

                <span class="separator"></span>

                <div id="userbox" class="userbox">
                    <a href="#" data-toggle="dropdown">
                        <figure class="profile-picture">
                            <img src="<?php echo site_url('images/avatar/' . $_SESSION['foto']); ?>" alt="Joseph Doe" class="img-circle" data-lock-picture="<?php echo site_url('images/avatar/' . $_SESSION['foto']); ?>" />
                        </figure>
                        <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                            <span class="name"><?php echo $_SESSION['nama']; ?></span>
                            <span class="role">member</span>
                        </div>

                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li class="divider"></li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="<?php echo site_url('member/profile') ?>"><i class="fa fa-user"></i> My Profile</a>
                            </li>
                            <!-- <li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li> -->
                            <li>
                                <a role="menuitem" tabindex="-1" href="<?php echo site_url('member/logout/'.$_SESSION['email']) ?>"><i class="fa fa-power-off"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end: search & user box -->
        </header>
        <!-- end: header -->

        <div class="inner-wrapper">
            <!-- start: sidebar -->
            <aside id="sidebar-left" class="sidebar-left">

                <div class="sidebar-header">
                    <div class="sidebar-title">
                        Navigation
                    </div>
                    <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <div class="nano">
                    <div class="nano-content">
                        <nav id="menu" class="nav-main" role="navigation">
                            <ul class="nav nav-main">
                                <li>
                                    <a href="<?php echo site_url('member/dashboard') ?>">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('member/list_data_member') ?>">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <span>View All User (JSON)</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </aside>
            <!-- end: sidebar -->
            <!-- end: page -->
            <section role="main" class="content-body">
                <header class="page-header">
                    <h2>Dashboard</h2>

                    <div class="right-wrapper pull-right">
                        <ol class="breadcrumbs">
                            <li>
                                <a href="index.html">
                                    <i class="fa fa-home"></i>
                                </a>
                            </li>
                        </ol>

                        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class=""></i></a>
                    </div>
                </header>

                <!-- start: page -->
                <section class="panel">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#" class="fa fa-caret-down"></a>
                            <!-- <a href="#" class="fa fa-times"></a> -->
                        </div>

                        <h2 class="panel-title">List Member Online</h2>
                    </header>
                    <div class="panel-body">
                        <table class="table table-bordered table-striped" id="datatable-ajax" data-url="<?php echo site_url('member/list_user_active') ?>">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </section>
                <!-- end: page -->
            </section>
        </div>
    </section>

    <!-- Vendor -->
    <script src="<?php echo site_url('assets/vendor/jquery/jquery.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/bootstrap/js/bootstrap.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/nanoscroller/nanoscroller.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/magnific-popup/magnific-popup.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/jquery-placeholder/jquery.placeholder.js'); ?>"></script>

    <!-- Specific Page Vendor -->
    <script src="<?php echo site_url('assets/vendor/select2/select2.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js'); ?>"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="<?php echo site_url('assets/javascripts/theme.js'); ?>"></script>

    <!-- Theme Custom -->
    <script src="<?php echo site_url('assets/javascripts/theme.custom.js'); ?>"></script>

    <!-- Theme Initialization Files -->
    <script src="<?php echo site_url('assets/javascripts/theme.init.js'); ?>"></script>


    <!-- Examples -->
    <script src="<?php echo site_url('assets/javascripts/tables/examples.datatables.ajax.js'); ?>"></script>
</body>

</html>