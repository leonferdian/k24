<?php $this->load->view('_partials/back_page/head');?>		
	<section class="body">
		<?php $this->load->view('_partials/back_page/page_header');?>
			<div class="inner-wrapper">
				<?php $this->load->view('_partials/back_page/menu');?>
				<section role="main" class="content-body">
					<?php $this->load->view('_partials/back_page/head_content');?>

					<div class="row">
						<div class="col-md-12">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title"><?php echo $page_title ?></h2>
								</header>
								<div class="panel-body">
									<h4>Welcome Back</h4>
								</div>
							</section>
						</div>
					</div>
				</section>
			</div>
		<?php $this->load->view('_partials/back_page/page_footer');?>
	</section>
<?php $this->load->view('_partials/back_page/foot');?>