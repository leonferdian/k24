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
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">Group</div>
                            <?php echo form_open('admin/users/groups/'.(isset($forms['id'])?'edit/'.$forms['id']:'add'), array('class'=>'form'));?>
                                <div class="card-body">
                                    <div class="form-group<?php if (isset($errors['group_name'])) echo ' has-error';?>">
                                        <label for="group_name">Group Name</label>
                                        <input type="text" class="form-control" id="group_name" name="group_name" placeholder="" value="<?php if (isset($forms['group_name'])) echo $forms['group_name']; ?>">
                                        <?php if(isset($errors['group_name'])) echo '<p class="help-block">'.$errors['group_name'].'</p>';?>
                                    </div>
                                    <div class="form-group<?php if (isset($errors['group_desc'])) echo ' has-error';?>">
                                        <label for="group_desc">Group Description</label>
                                        <input type="text" class="form-control" id="group_desc" name="group_desc" placeholder="" value="<?php if (isset($forms['group_desc'])) echo $forms['group_desc']; ?>">
                                        <?php if(isset($errors['group_desc'])) echo '<p class="help-block">'.$errors['group_desc'].'</p>';?>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Save</button>
                                    <a href="<?php echo site_url('admin/users/groups');?>" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Cancel</a>
                                </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div> <!-- animated -->
        </div> <!-- /.content -->

    </div><!-- /#right-panel -->
    <!-- Right Panel -->

<?php $this->load->view('_partials/page_footer');?>
<?php $this->load->view('_partials/foot');?>
