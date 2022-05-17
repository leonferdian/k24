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
                            <div class="card-header">Menu</div>
                            <div class="card-body card-block">
                                <?php echo form_open('admin/menu/'.(isset($forms['id'])?'edit/'.$forms['id']:'add'), array('class'=>'form-horizontal'));?>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <div class="input-group<?php if(isset($errors['title'])) echo ' has-error';?>">
                                            <div class="input-group-addon"><i class="fa fa-font"></i></div>
                                            <input type="text" id="title" name="title" placeholder="Title" class="form-control" value="<?php if(isset($forms['title'])) echo html_escape($forms['title']);?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Parent</label>
                                        <div class="input-group<?php if(isset($errors['parent_id'])) echo ' has-error';?>">
                                            <div class="input-group-addon"><i class="fa fa-folder-o"></i></div>
                                            <select name="parent_id" id="parent_id" class="form-control">
                                            <?php echo $op_parents ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Url</label>
                                        <div class="input-group<?php if(isset($errors['url'])) echo ' has-error';?>">
                                            <div class="input-group-addon"><i class="fa fa-chain"></i></div>
                                            <input type="text" id="url" name="url" class="form-control" placeholder="url" value="<?php if(isset($forms['url'])) echo html_escape($forms['url']);?>">
                                        </div>
                                    </div>
                                    <div class="form-group<?php if(isset($errors['icon'])) echo ' has-error';?>">
                                        <label>Icon</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-smile-o"></i></div>
                                            <input name="icon" data-placement="bottomRight" class="form-control icp icp-auto" placeholder="icon" value="<?php if(isset($forms['icon'])) echo html_escape($forms['icon']);?>"
                                                type="text"/>
                                            <span class="input-group-addon fa fa-archive"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label>
                                                <input type="checkbox" name="status" value="1" class="flat-red"<?php if(isset($forms['status']) && $forms['status']) echo ' checked';?>>
                                                Active
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-actions form-group">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Save</button>
                                        <a href="<?php echo site_url('admin/menu');?>" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Cancel</a>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

    </div><!-- /#right-panel -->
    <!-- Right Panel -->

<?php $this->load->view('_partials/page_footer');?>
<?php $this->load->view('_partials/foot');?>
