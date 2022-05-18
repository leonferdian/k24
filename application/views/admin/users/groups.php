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
                                        <a href="<?php echo site_url('admin/users/groups/add');?>" class="btn btn-primary"><i class="fa fa-plus-square"></i> New Group</a>
                                    </div>
                                </div>
							</header>
							<div class="panel-body">
								<table class="table table-bordered table-striped" id="datatable-default" data-url="<?php echo site_url('admin/users/listdata') ?>">
									<thead>
										<tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
                                    <?php
                                        foreach ($list_group as $row)
                                        {
                                            $url_edit = site_url('admin/users/groups/edit/'.$row->id);
                                            $url_del = site_url('admin/users/groups/del/'.$row->id);  
                                            $action = '<div class="btn-group pull-right"><a href="'.$url_edit.'" class="btn btn-info btn-sm btnEdit mr-2">Edit</a> <button class="btn btn-delete btn-sm btn-danger btnRemove" data-url="'.$url_del.'">Delete</button></div>';
                                    ?>
                                        <tr>
                                            <td><?php echo $row->id ?></td>
                                            <td><?php echo $row->name ?></td>
                                            <td><?php echo $row->description ?></td>    
                                            <td><?php echo $action ?></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
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