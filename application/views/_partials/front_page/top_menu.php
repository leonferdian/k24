        <!-- top Header -->
        <div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span>Welcome to <?php echo isset($page_title) ? $page_title : 'Creative E-Commerce' ?></span>
				</div>
				<div class="pull-right">
					<ul class="header-top-links">
						<?php
							$top_menu = $this->Menu_model->menu('top_menu');
							foreach ($top_menu as $menu)
							{
						?>
						<?php if ($menu->parent_id == 0 && $menu->child < 1): ?>
						<li><a href="<?php echo $menu->url ?>"><?php echo $menu->title ?></a></li>
						<?php endif ?>
						<?php } ?>
						<?php
							$top_menu = $this->Menu_model->menu('top_menu', 'AND child > 0');
							foreach ($top_menu as $menu)
							{
						?>
						<li class="dropdown default-dropdown">
							<?php if ($menu->parent_id == 0): ?>
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><?php echo $menu->title ?> <i class="fa fa-caret-down"></i></a>
							<?php endif; ?>
							<ul class="custom-menu">
							<?php 
								$sub_top_menu = $this->Menu_model->submenu('top_menu', $menu->id);
								foreach ($sub_top_menu as $menu)
								{
							?>
								<li><a href="<?php echo $menu->url ?>"><?php echo $menu->title ?></a></li>
							<?php } ?>
							</ul>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		<!-- /top Header -->