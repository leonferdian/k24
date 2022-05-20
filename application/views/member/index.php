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
               <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Register</h2>
            </div>
            <div class="panel-body">
               <?php #echo form_open('member/register', array('class' => 'form-horizontal form-bordered', 'id' => 'submit_form')); ?>
               <div class="form-group mb-lg">
                  <label>Nama</label>
                  <input name="nama" id="nama" type="text" class="form-control input-lg" required />
               </div>

               <div class="form-group mb-lg">
                  <label>NIK KTP</label>
                  <input name="nik" id="nik" type="text" class="form-control input-lg" required />
               </div>

               <div class="form-group mb-lg">
                  <label>E-mail Address</label>
                  <input name="email" id="email" type="email" class="form-control input-lg" required />
               </div>

               <div class="form-group mb-none">
                  <div class="row">
                     <div class="col-sm-6 mb-lg">
                        <label>Password</label>
                        <input name="password" id="password" type="password" class="form-control input-lg" required />
                     </div>
                     <div class="col-sm-6 mb-lg">
                        <label>Password Confirmation</label>
                        <input name="pwd_confirm" id="pwd_confirm" type="password" class="form-control input-lg" required />
                     </div>
                  </div>
               </div>

               <div class="form-group mb-lg">
                  <label>No. Hp</label>
                  <input name="phone" id="phone" type="text" class="form-control input-lg" required />
               </div>

               <div class="form-group">
                  <label class="control-label">Tanggal Lahir</label>
                  <div class="input-group">
                     <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                     </span>
                     <input type="text" name="tgl_lahir" id="tgl_lahir" data-plugin-datepicker class="form-control" required>
                  </div>
               </div>

               <div class="form-group">
                  <label class="control-label">Jenis Kelamin</label>
                  <select class="form-control" name="gender" id="gender" data-plugin-multiselect id="ms_example1">
                     <option value="L">Laki- Laki</option>
                     <option value="P">Perempuan</option>
                  </select>
               </div>

               <div class="form-group mb-lg">
                  <label>Upload Foto</label>
                  <input name="foto" id="foto" type="file" class="form-control input-lg" required />
               </div>

               <div class="row">
                  <div class="col-sm-8">
                     <div class="checkbox-custom checkbox-default">
                        <input id="AgreeTerms" name="agreeterms" type="checkbox" />
                        <label for="AgreeTerms">I agree with <a href="#">terms of use</a></label>
                     </div>
                  </div>
                  <div class="col-sm-4 text-right">
                     <button type="submit" class="btn btn-primary hidden-xs" onclick="register()">Sign Up</button>
                     <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg" onclick="register()">Sign Up</button>
                  </div>
               </div>

               <p class="text-center">Already have an account? <a href="<?php echo site_url('member/login'); ?>">Sign In!</a>

                  <?php #echo form_close(); ?>
            </div>
         </div>

      </div>
   </section>
   <!-- end: page -->

   <script>
      function register() {
         var fd = new FormData();

         var nama = $('#nama').val();
         fd.append('nama', nama);

         var nik = $('#nik').val();
         fd.append('nik', nik);

         var email = $('#email').val();
         fd.append('email', email);

         var password = $('#password').val();
         fd.append('password', password);

         var pwd_confirm = $('#pwd_confirm').val();
         fd.append('pwd_confirm', pwd_confirm);

         var phone = $('#phone').val();
         fd.append('phone', phone);

         var tgl_lahir = $('#tgl_lahir').val();
         fd.append('tgl_lahir', tgl_lahir);

         var gender = $('#gender').val();
         fd.append('gender', gender);

         var foto = $('#foto').get(0).files[0];
         fd.append('foto', foto);

         $.ajax({
            type: "POST",
            processData: false, //important
            contentType: false, //important
            url: "member/register",
            data: fd,
            success: function(responseText) {
               alert(responseText);
               location.href="member/login";
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
   <script src="<?php echo site_url('assets/javascripts/forms/examples.advanced.form.js'); ?>"></script>

</body>

</html>