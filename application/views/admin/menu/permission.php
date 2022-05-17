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
                                <h3 class="card-title">Permissions</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create"><i class="fa fa-plus-square"></i> Add Permission</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header">
                                <strong class="card-title">List Permissions</strong>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Username</th>
                                                <th>Permission</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                    
                                                    foreach ($list_permission as $row)
                                                    {
                                                        $user_perm = $this->Menu_model->select_username_perm($row->user_id);
                                                        foreach ($user_perm as $user)
                                                        {
                                                            $username = $user->username;
                                                        }

                                                        $permission = $row->description;
                                                ?>
                                                <tr>
                                                <td><?php echo $row->id ?></td>
                                                <td><?php echo $username ?></td>
                                                <td><?php echo $permission ?></td>
                                                <td>
                                                    <div class="btn-group pull-right">
                                                        <a class="btn btn-sm btn-info mr-2" style="color:white;" href="<?php echo site_url('admin/menu/edit_permission/'.$row->id) ?>">Edit</a>
                                                        <button class="btn btn-delete btn-sm btn-danger" data-url="<?php echo site_url('admin/menu/delete_permission/'.$row->id) ?>">Delete</button>
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

                <!-- Modal -->
                <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Edit Permissions</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                        <div class="modal-body">
                            <?php echo form_open('admin/menu/permission/'.(isset($forms['id'])?'add_permission/'.$forms['id']:'add_permission'), array('class'=>'form'));?>
                                <div class="form-group">
                                    <label for="username">username</label>
                                    <select name="username" class="form-control">
                                        <?php echo $op_username ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="permission">permission</label>
                                    <select name="permission" class="form-control">
                                        <?php echo $op_permission ?>
                                    </select>
                                </div>
                            <?php echo form_close() ?>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary btn_save">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

    </div><!-- /#right-panel -->
    <!-- Right Panel -->
<?php $this->load->view('_partials/page_footer');?>
<?php $this->load->view('_partials/foot');?>
