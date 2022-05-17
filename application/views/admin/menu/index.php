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
						
								<h2 class="panel-title">Ajax</h2>
							</header>
							<div class="panel-body">
								<table class="table table-bordered table-striped" id="datatable-ajax" data-url="assets/ajax/ajax-datatables-sample.json">
									<thead>
										<tr>
											<th width="20%">Rendering engine</th>
											<th width="25%">Browser</th>
											<th width="25%">Platform(s)</th>
											<th width="15%">Engine version</th>
											<th width="15%">CSS grade</th>
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
<?php $this->load->view('_partials/back_page/foot');?>

                <div class="card">
                            <div class="card-header with-border">
                                <h3 class="card-title">Admin Menu</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <a href="<?php echo site_url('admin/menu/add');?>" class="btn btn-sm btn-primary"><i class="fa fa-plus-square"></i> New Menu</a>
                                        <a href="<?php echo site_url('admin/menu/permission');?>" class="btn btn-sm btn-primary"><i class="ti-lock"></i> Permission</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header">
                                <strong class="card-title">List Menu</strong>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Parent</th>
                                                <th>status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                    foreach ($menu as $row)
                                                    {
                                                        $status = "";
                                                        if ($row->status == 1) 
                                                            $status = 'active';
                                                        else
                                                            $status = 'inactive';
                                                            $parent = $this->Menu_model->select_parent($row->parent_id);
                                                ?>
                                                <tr>
                                                <td><?php echo $row->id ?></td>
                                                <td><?php echo $row->title ?></td>
                                                <td><?php echo $parent ?></td>
                                                <td><?php echo $status ?></td>
                                                <td>
                                                    <div class="btn-group pull-right">
                                                        <a class="btn btn-sm btn-info mr-2" style="color:white;" href="<?php echo site_url('admin/menu/edit/'.$row->id) ?>">Edit</a>
                                                        <button class="btn btn-delete btn-sm btn-danger" data-url="<?php echo site_url('admin/menu/delete_menu/'.$row->id) ?>">Delete</button>
                                                    </div>
                                                </td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>