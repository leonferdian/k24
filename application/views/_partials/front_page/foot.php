	<!-- FOOTER -->
	<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="#">
		            <img src="https://shoesmart.co.id//assets/images/brand/logo2.png" alt="">
		          </a>
						</div>
						<!-- /footer logo -->

						<!-- footer social -->
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<?php
					$footer_menu = $this->Menu_model->menu('footer_menu', 'AND child > 0');
					foreach ($footer_menu as $menu)
					{
				?>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<?php if ($menu->parent_id == 0 && $menu->child > 1): ?>
						<h3 class="footer-header"><?php echo $menu->title ?></h3>
						<?php endif; ?>
						<ul class="list-links">
							<?php
								$subfooter_menu = $this->Menu_model->submenu('footer_menu', $menu->id);
								foreach ($subfooter_menu as $menu)
								{
							?>
								<li><a href="<?php echo $menu->url ?>"><?php echo $menu->title ?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<?php } ?>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Stay Connected</h3>
						<form>
							<div class="form-group">
								<input class="input" placeholder="Enter Email Address">
							</div>
							<button class="primary-btn">Join Newslatter</button>
						</form>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <a href="<?php echo site_url() ?>" target="_blank">Creative E-Commerce</a> <strong>Powered By <a href="https://stove.creativedigiads.com" target="_blank">K24 Member</a></strong>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->
    
    <!-- jQuery Plugins -->
    <script src="<?php echo site_url('assets/front/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/front/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/front/js/slick.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/front/js/nouislider.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/front/js/jquery.zoom.min.js'); ?>"></script>
	<script src="<?php echo site_url('assets/front/js/main.js'); ?>"></script>
	<script src="<?php echo site_url('assets/js/front_page.js'); ?>"></script>

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