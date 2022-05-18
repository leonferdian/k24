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
                                        <a href="<?php echo site_url('admin/users/add');?>" class="btn btn-sm btn-primary"><i class="fa fa-plus-square"></i> New Admin</a>
                                    </div>
                                </div>
							</header>
							<div class="panel-body">
								<table class="table table-bordered table-striped" id="datatable-default" data-url="<?php echo site_url('admin/users/listdata') ?>">
									<thead>
										<tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Groups</th>
                                            <th>Status</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
                                    <?php
                                        foreach ($users as $row)
                                        {
                                            $status = "";
                                            if ($row->active == 1) 
                                                $status = '<span class="label label-success">active</span>';
                                            else
                                                $status = '<span class="label label-default">disabled</span>';
                                                $group_id = $this->Users_model->get_group($row->id);
                                                $groups = $this->Users_model->select_groups('id = '.$group_id);
                                                foreach ($groups as $groups)
                                                {
                                                    $groups = strtoupper($groups->name);
                                                }
                                    ?>
                                        <tr>
                                            <td><?php echo $row->id ?></td>
                                            <td><?php echo $row->username ?></td>
                                            <td><?php echo $row->first_name ?></td>
                                            <td><?php echo $row->last_name ?></td>
                                            <td><?php echo $row->email ?></td>
                                            <td><?php if (isset($groups)) echo $groups; ?></td>
                                            <td><?php echo $status ?></td>
                                            <td>
                                                <div class="btn-group pull-right">
                                                    <a class="btn btn-sm btn-info" href="<?php echo site_url('admin/users/edit/'.$row->id) ?>">Edit</a>
                                                    <button class="btn btn-delete btn-sm btn-danger" data-url="<?php echo site_url('admin/users/delete/'.$row->id) ?>">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
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