	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav show-on-click">
					<span class="category-header">Categories <i class="fa fa-list"></i></span>
					<ul class="category-list">
						<?php
							$categories = $this->Category_model->category();
							foreach ($categories as $row) echo '<li><a href="'.site_url('homeshop/category/'.$row->name).'">'.$row->name.'</a></li>';
						?>
						<li><a href="<?php echo site_url('homeshop/new') ?>">NEW COLLECTION</a></li>
						<li><a href="<?php echo site_url('homeshop/promo') ?>">HOT DEAL</a></li>
						<li><a href="#">View All</a></li>
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<?php
							$main_menu = $this->Menu_model->menu('main_menu');
							foreach ($main_menu as $menu)
							{
						?>
							<?php if ($menu->parent_id == 0 && $menu->child < 1): ?>
							<li><a href="<?php echo site_url($menu->url) ?>"><?php echo $menu->title ?></a></li>
							<?php endif; ?>
						<?php } ?>
						<?php
							$main_menu = $this->Menu_model->menu('main_menu', 'AND child > 0');
							foreach ($main_menu as $menu)
							{
						?>
						<li class="dropdown mega-dropdown">
						<?php if ($menu->parent_id == 0): ?>
						<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><?php echo $menu->title ?> <i class="fa fa-caret-down"></i></a>
						<?php endif; ?>
							<div class="custom-menu">
								<div class="row">
									<?php 
										$sub_main_menu = $this->Menu_model->submenu('main_menu', $menu->id);
										foreach ($sub_main_menu as $menu)
										{
									?>
									<div class="col-md-5">
										<hr class="hidden-md hidden-lg">
										<!--
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="<?php echo site_url($menu->url) ?>">
												<img src="<?php echo site_url('assets/front/img/banner06.jpg') ?>" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase"><?php echo $menu->title ?></h3>
												</div>
											</a>
											<hr>
										</div>
										-->
										<ul class="list-links">
											<li><a href="<?php echo site_url($menu->url )?>"><?php echo $menu->title ?></a></li>
										</ul>
									</div>
									<?php } ?>
								</div>
							</div>
						</li>
						<?php } ?>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->