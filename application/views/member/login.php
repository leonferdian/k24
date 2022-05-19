<!doctype html>
<html class="fixed">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title><?php echo $page_title; ?></title>
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
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/select2/select2.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/dropzone/css/basic.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/dropzone/css/dropzone.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/summernote/summernote.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/summernote/summernote-bs3.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/codemirror/lib/codemirror.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('assets/vendor/codemirror/theme/monokai.css'); ?>" />

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
    <!-- start: page -->
    <section class="body-sign">
        <div class="center-sign">
            <!-- <a href="/" class="logo pull-left">
                <img src="assets/images/logo.png" height="54" alt="Porto Admin" />
            </a> -->

            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
                </div>
                <div class="panel-body">
                    <?php #echo form_open('member/login', array('class'=>'form-horizontal form-bordered', 'id'=>'submit_form'));?>
                        <div class="form-group mb-lg">
                            <label>Email</label>
                            <div class="input-group input-group-icon">
                                <input name="email" id="email" type="email" class="form-control input-lg" />
                                <span class="input-group-addon">
                                    <span class="icon icon-lg">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </span>
                            </div>
                        </div>

                        <div class="form-group mb-lg">
                            <div class="clearfix">
                                <label class="pull-left">Password</label>
                                <!-- <a href="pages-recover-password.html" class="pull-right">Lost Password?</a> -->
                            </div>
                            <div class="input-group input-group-icon">
                                <input name="password" id="password" type="password" class="form-control input-lg" />
                                <span class="input-group-addon">
                                    <span class="icon icon-lg">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="checkbox-custom checkbox-default">
                                    <input id="RememberMe" name="rememberme" type="checkbox" />
                                    <label for="RememberMe">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">
                                <button type="submit" class="btn btn-primary hidden-xs" onclick="login()">Sign In</button>
                                <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
                            </div>
                        </div>

                        <!-- <span class="mt-lg mb-lg line-thru text-center text-uppercase">
                            <span>or</span>
                        </span> -->

                        <!-- <div class="mb-xs text-center">
                            <a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
                            <a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
                        </div> -->

                        <p class="text-center">Don't have an account yet? <a href="<?php echo site_url('member');?>">Sign Up!</a>

                    <?php #echo form_close(); ?>
                </div>
            </div>

            <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
        </div>
    </section>
    <!-- end: page -->

    <script>
      function login() {
         var fd = new FormData();

         var email = $('#email').val();
         fd.append('email', email);

         var password = $('#password').val();
         fd.append('password', password);

         $.ajax({
            type: "POST",
            processData: false, //important
            contentType: false, //important
            url: "login_submit",
            data: fd,
            success: function(responseText) {
               
               if (responseText.trim() == "Login Success") {
                    location.href="dashboard";
               } else {
                    alert(responseText);
                    // location.reload();
               }
               
            },
            error: function(data) {
               alert(data);
               $("#progress1").hide();
            }
         });
      }
   </script>

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
    <script src="<?php echo site_url('assets/vendor/select2/select2.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/jquery-maskedinput/jquery.maskedinput.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/fuelux/js/spinner.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/dropzone/dropzone.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/bootstrap-markdown/js/markdown.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/bootstrap-markdown/js/to-markdown.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/bootstrap-markdown/js/bootstrap-markdown.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/codemirror/lib/codemirror.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/codemirror/addon/selection/active-line.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/codemirror/addon/edit/matchbrackets.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/codemirror/mode/javascript/javascript.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/codemirror/mode/xml/xml.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/codemirror/mode/htmlmixed/htmlmixed.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/codemirror/mode/css/css.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/summernote/summernote.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js'); ?>"></script>
    <script src="<?php echo site_url('assets/vendor/ios7-switch/ios7-switch.js'); ?>"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="<?php echo site_url('assets/javascripts/theme.js'); ?>"></script>

    <!-- Theme Custom -->
    <script src="<?php echo site_url('assets/javascripts/theme.custom.js'); ?>"></script>

    <!-- Theme Initialization Files -->
    <script src="<?php echo site_url('assets/javascripts/theme.init.js'); ?>"></script>


    <!-- Examples -->
    <script src="<?php echo site_url('assets/javascripts/forms/examples.advanced.form.js'); ?>" />
    </script>

</body>

</html>