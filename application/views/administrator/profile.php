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
                     <img src="<?php echo site_url('assets/images/!logged-user.jpg'); ?>" alt="Joseph Doe" class="img-circle" data-lock-picture="<?php echo site_url('assets/images/!logged-user.jpg'); ?>" />
                  </figure>
                  <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                     <span class="name"><?php echo $this->session->userdata( 'username' ); ?></span>
                     <span class="role">member</span>
                  </div>

                  <i class="fa custom-caret"></i>
               </a>

               <div class="dropdown-menu">
                  <ul class="list-unstyled">
                     <li class="divider"></li>
                     <!-- <li>
                        <a role="menuitem" tabindex="-1" href=""><i class="fa fa-user"></i> My Profile</a>
                     </li> -->
                     <!-- <li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li> -->
                     <li>
                        <a role="menuitem" tabindex="-1" href="<?php echo site_url('logout') ?>"><i class="fa fa-power-off"></i> Logout</a>
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
                           <a href="<?php echo site_url('administrator') ?>">
                              <i class="fa fa-home" aria-hidden="true"></i>
                              <span>Dashboard</span>
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

                  <h2 class="panel-title">Profile</h2>
               </header>
               <div class="panel-body">
                  <div class="thumb-info mb-md">
                     <img src="<?php echo site_url('images/avatar/'.$row_data['foto']); ?>" style="width: 300px;" class="rounded img-responsive" alt="John Doe">
                     <div class="thumb-info-title">
                        <span class="thumb-info-inner"><?php echo $row_data['nama']; ?></span>
                        <span class="thumb-info-type">Member</span>
                     </div>
                  </div>
                  <div class="form-group mb-lg">
                     <label>Nama</label>
                     <input name="nama" id="nama" type="text" class="form-control input-lg" value="<?php echo $row_data['nama']; ?>" required />
                  </div>

                  <div class="form-group mb-lg">
                     <label>NIK KTP</label>
                     <input name="nik" id="nik" type="text" class="form-control input-lg" value="<?php echo $row_data['nik']; ?>" required />
                  </div>

                  <div class="form-group mb-lg">
                     <label>E-mail Address</label>
                     <input name="email" id="email" type="email" class="form-control input-lg" value="<?php echo $row_data['email']; ?>" required />
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
                     <input name="phone" id="phone" type="text" class="form-control input-lg" value="<?php echo $row_data['phone']; ?>" required />
                  </div>

                  <div class="form-group">
                     <label class="control-label">Tanggal Lahir</label>
                     <div class="input-group">
                        <span class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                        </span>
                        <input type="text" name="tgl_lahir" id="tgl_lahir" data-plugin-datepicker class="form-control" value="<?php echo $row_data['tgl_lahir']; ?>" required>
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label">Jenis Kelamin</label>
                     <select class="form-control" name="gender" id="gender" data-plugin-multiselect id="ms_example1">
                        <option value="L" <?php echo isset($row_data['gender']) && $row_data['gender'] == "L" ? "selected" : ""; ?>>Laki- Laki</option>
                        <option value="P" <?php echo isset($row_data['gender']) && $row_data['gender'] == "P" ? "selected" : ""; ?>>Perempuan</option>
                     </select>
                  </div>

                  <div class="form-group mb-lg">
                     <label>Upload Foto</label>
                     <input name="foto" id="foto" type="file" class="form-control input-lg" required />
                  </div>

                  <div class="row">
                     <div class="col-sm-4 text-right">
                        <button type="submit" class="btn btn-success hidden-xs" onclick="update_profile()">Save</button>
                        <button type="submit" class="btn btn-success btn-block btn-lg visible-xs mt-lg" onclick="update_profile()">Save</button>
                     </div>
                  </div>
               </div>
            </section>
            <!-- end: page -->
         </section>
      </div>
   </section>

   <script>
      function update_profile() {
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

         var size = $('#foto').get(0).files.length;
         fd.append('size', size);

         $.ajax({
            type: "POST",
            processData: false, //important
            contentType: false, //important
            url: "member/update_profile",
            data: fd,
            success: function(responseText) {
               alert(responseText);
               location.href = "member/login";
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