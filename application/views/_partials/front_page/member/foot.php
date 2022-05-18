 	<!-- footer
   =================================================== -->
   <footer class="group">         

     	<!-- <ul class="footer-social">
         <li><a href="#"><i class="fa fa-facebook"></i></a></li>
         <li><a href="#"><i class="fa fa-twitter"></i></a></li>
         <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
         <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
         <li><a href="#"><i class="fa fa-instagram"></i></a></li>
         <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
         <li><a href="#"><i class="fa fa-skype"></i></a></li>
     	</ul>    -->

     	<ul class="footer-copyright text-light">
         <li>&copy; Copyright 2020 K24 Member</li>
      </ul>  
        
   </footer> 

   <div id="preloader"> 
    	<div id="loader">
     	</div>
   </div> 
   
<!-- Script
=================================================== -->
<script src="<?php echo site_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/jquery-migrate-1.2.1.min.js'); ?>"></script>
<script src="http://maps.google.com/maps/api/js?v=3.13&amp;sensor=false"></script>    
<script src="<?php echo site_url('assets/js/jquery.fittext.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/jquery.countdown.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/jquery.placeholder.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/jquery.ajaxchimp.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/main.js'); ?>"></script>    
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