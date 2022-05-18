<?php $this->load->view('_partials/back_page/head');?>		
	<section class="body">
		<?php $this->load->view('_partials/back_page/page_header');?>
			<div class="inner-wrapper">
				<?php $this->load->view('_partials/back_page/menu');?>
				<section role="main" class="content-body">
					<?php $this->load->view('_partials/back_page/head_content');?>

					<!-- start: page -->
                        <section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
								<div class="row">
									<div class="col-md-5">
										<button type="button" class="btn btn-primary" data-action="<?php echo site_url('admin/menu/'.$table.'/add');?>" data-toggle="modal" data-target="#form_modal"><i class="fa fa-plus-square"></i> Add Menu</button>
									</div>
								</div>
							</header>
							<div class="panel-body">
								<table class="table table-bordered table-striped" id="datatable-ajax" data-url="<?php echo site_url('admin/menu/listdata/'.$table) ?>">
									<thead>
										<tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>url</th>
                                            <th>status</th>
                                            <th>Action</th>
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
		<?php $this->load->view('_partials/back_page/page_footer');?>
	</section>
	<?php $this->load->view('_partials/back_page/menu_modal');?>
<?php $this->load->view('_partials/back_page/foot');?>