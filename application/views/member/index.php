<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
   <?php $this->load->view('_partials/front_page/member/head');?>
  
  <!--[if lt IE 9]>
   	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. 
   	Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
   <![endif]-->   

   <!-- content-wrap -->
   <style>
      .form-control {
         width: -webkit-fill-available;
      }
   </style>
   <div id="content-wrap">

      <!-- main  -->
      <main class="row">

            <header class="site-header">
               <!-- <div class="logo">
               	<a href="index.html"></a>
               </div>  -->
            </header>

            <div id="main-content" class="twelve columns">

               <h1>Register</h1>

               <hr>

               <!-- <div id="counter" class="group">
                  <span>134 <em>days</em></span> 
                  <span>12 <em>hours</em></span>
                  <span>50 <em>minutes</em></span>
                  <span>33 <em>seconds</em></span> 
               </div>                   -->

               <!-- MailChimp Signup Form -->
               <div id="mc-signup">

                  <?php echo form_open('member/register', array('class'=>'form-horizontal form-bordered', 'id'=>'submit_form'));?>
                     <div class="form-group">
                        <input type="text" value="" style="background-color: seashell;" name="nama" class="form-control" id="nama" placeholder="Nama..." required>
                     </div>
                     <div class="form-group">
                        <input type="password" value="" style="background-color: seashell;" name="password" class="form-control" id="password" placeholder="Password..." required>
                     </div>
                     <div class="form-group">
                        <input type="text" value="" style="background-color: seashell;" name="phone" class="form-control" id="phone" placeholder="No. Hp..." required>
                     </div>
                     <div class="form-group">
                        <input type="text" value="" style="background-color: seashell;" name="birthdate" class="form-control" id="birthdate" placeholder="Tanggal Lahir..." required>
                     </div>
                     <div class="form-group">
               		   <input type="email" value="" style="background-color: seashell; width: -webkit-fill-available;" name="email" class="form-control" id="email" placeholder="Email..." required>
                     </div>
                     
                     <div class="form-group">
                        <input type="text" value="" style="background-color: seashell;" name="nik" class="form-control" id="nik" placeholder="NIK KTP..." required>
                     </div>
                     <div class="form-group">
                        <select class="form-control" id="jenis_kelamin">
                           <option value="L">Laki-Laki</option>
                           <option value="P">Perempuan</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label style="display: flex;">Foto</label>
                        <input type="file" style="color: seashell;" id="foto" class="form-control">
                     </div>
                     <!-- <label for="mce-EMAIL" class="subscribe-message"></label> -->
                     <input type="submit" style="margin-bottom: 10px; margin-top: 10px;" value="Submit" name="btn-register" class="button">
                  <?php echo form_close(); ?>

               </div> <!-- /sign-up form -->

            </div><!-- /main-content form -->

            <div class="modal-toggles">
               <ul>
                    <li class="about-us"><a href="#mod-about">Login</a></li>
                    <!--<li class="location"><a href="#mod-map">Our Location</a></li>-->
               </ul>
            </div><!-- /modal-toggles --> 	
            
      </main>	      

   </div><!-- /content-wrap --> 
    	

   <!-- modals
   =================================================== -->
	      
	<section id="mod-about" >

	   <!-- Modal toggle -->
	   <div class="modal-toggle">
	      <a href="#" title="close" id="modal-close">Close</a>
	   </div>	        	

	   <div class="row about-header">

			<div class="twelve columns">	

			   <div class="icon-wrap">
			      <i class="icon"></i>
			   </div>

				<h1>Login</h1>			         

			</div>

	   </div> <!-- /about-header -->                   	

		<div class="row about-content">
							
			<!-- <div class="six columns mob-whole">
				<p>Are you ready to the next level of your business?<br>
               Let's join us, advertise your business and grow up your revenue.
               Creative Digiads is ready to promote your business profile. 
            </p>
			</div>

			<div class="six columns mob-whole contact">
			
			   <h3>Contact Numbers:</h3>
			   <p>+6281233399750</p>

			   <h3>Email:</h3>
			   <p>admin@creativedigiads.com<br>
			   </p>

			</div>             -->

            <div id="main-content" class="twelve columns">

               <hr>

               <!-- <div id="counter" class="group">
                  <span>134 <em>days</em></span> 
                  <span>12 <em>hours</em></span>
                  <span>50 <em>minutes</em></span>
                  <span>33 <em>seconds</em></span> 
               </div>                   -->

               <!-- MailChimp Signup Form -->
               <div id="mc-signup">

                  <form id="form-login" action="member/login">
                     <div class="form-group">
               		   <input type="email" value="" style="background-color: seashell; width: -webkit-fill-available;" name="email" class="form-control" id="email" placeholder="Email..." required>
                     </div>
                     <div class="form-group">
                        <input type="password" value="" style="background-color: seashell;" name="password" class="form-control" id="password" placeholder="Password..." required>
                     </div>
                     <input type="submit" style="margin-bottom: 10px; margin-top: 10px;" value="Login" name="btn-login" class="button">
                  </form>

               </div> <!-- /sign-up form -->

            </div><!-- /main-content form -->

		</div> <!-- /about-content -->

		<!-- <div class="slider row">

		   <hr>

		   <ul id="owl-slider" class="owl-carousel">
           	<li class="item s-digital-media">
              	<span class="slider-icon"></span>
              	<p>Digital Media</p>
            </li>
            <li class="item s-marketing">
              	<span class="slider-icon"></span>
              	<p>Marketing</p>
            </li>
            <li class="item s-videography">
              	<span class="slider-icon"></span>
              	<p>Videography</p>
            </li>                  	
            <li class="item s-webdesign">
              	<span class="slider-icon"></span>
              	<p>Web Design</p>
            </li>
            <li class="item s-branding">
               <span class="slider-icon"></span>
               <p>Branding</p>
            </li>
            <li class="item s-web-development">
              	<span class="slider-icon"></span>
              	<p>Web Development</p>
            </li>
         </ul>

		</div> -->
      <!-- /slider -->			      

   </section><!-- /mod-about -->

   <section id="mod-map" >

      <!-- Modal toggle -->
      <div class="modal-toggle">
         <a href="#" title="close" id="modal-close"><span>Close</span></a>
      </div>

      <div id="map-container"></div>

      <div id="map-zoom-in"></div>
		<div id="map-zoom-out"></div>
      
      <address>
      </address> 

   </section><!-- /mod-about -->
   <?php $this->load->view('_partials/front_page/member/foot');?>