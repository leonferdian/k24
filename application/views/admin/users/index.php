<?php $page = site_url('/'.$parent_title.'/'.$page_title); ?>
<?php $this->load->view('_partials/head');?>
<?php $this->load->view('_partials/menu');?>
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <?php $this->load->view('_partials/page_header');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo $page_title ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><i class="ti-home"></i> <?php echo str_replace(site_url(),' / ',$page) ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header with-border">
                                <h3 class="card-title">Admin Users</h3>
                            </div>
                            <div class="card-body">
                                <form>
                                <div class="row">
                                    <div class="col-md-5">
                                        <a href="<?php echo site_url('admin/users/add');?>" class="btn btn-sm btn-primary"><i class="fa fa-plus-square"></i> New Admin</a>
                                        <a href="<?php echo site_url('admin/users/groups');?>" class="btn btn-sm btn-primary"><i class="fa fa-users"></i> Admin Groups</a>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="card-body">
								<div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Username</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Groups</th>
                                            <th style="width: 40px" >Status</th>
                                            <th style="width: 60px" class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($users as $row)
                                                {
                                                    $status = "";
                                                    if ($row->active == 1) 
                                                        $status = 'active';
                                                    else
                                                        $status = 'inactive';
                                                        $groups = $this->Users_model->get_group($row->id);	
                                            ?>
                                                    <tr>
                                                    <td><?php echo $row->id ?></td>
                                                    <td><?php echo $row->username ?></td>
                                                    <td><?php echo $row->first_name ?></td>
                                                    <td><?php echo $row->last_name ?></td>
                                                    <td><?php echo $row->email ?></td>
                                                    <td><?php echo $groups ?></td>
                                                    <td><?php echo $status ?></td>
                                                    <td>
                                                        <div class="btn-group pull-right">
                                                            <a class="btn btn-sm btn-info mr-2" style="color:white;" href="<?php echo site_url('admin/users/edit/'.$row->id) ?>">Edit</a>
                                                            <button class="btn btn-delete btn-sm btn-danger" data-url="<?php echo site_url('admin/users/delete/'.$row->id) ?>">Delete</button>
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
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

    </div><!-- /#right-panel -->
    <!-- Right Panel -->

<?php $this->load->view('_partials/page_footer');?>
<?php $this->load->view('_partials/foot');?>
