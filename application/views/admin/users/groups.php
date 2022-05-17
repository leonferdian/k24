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
                                <h3 class="card-title">Groups</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <a href="<?php echo site_url('admin/users/groups/add');?>" class="btn btn-primary">New Group</a>   
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th style="width: 60px" class="text-center">Action</th>
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
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div> <!-- animated -->
        </div>
        <!-- /.content -->

    </div><!-- /#right-panel -->
    <!-- Right Panel -->

<?php $this->load->view('_partials/page_footer');?>
<?php $this->load->view('_partials/foot');?>
