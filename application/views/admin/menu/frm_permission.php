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
						
								<h2 class="panel-title">Permission</h2>
							</header>
							<div class="panel-body">
                                <?php echo form_open('admin/menu/'.(isset($forms['id'])?'edit_permission/'.$forms['id']:'add_permission'), array('class'=>'form-horizontal form-bordered', 'id'=>'submit_form'));?>
                                    <div class="form-group">
										<label class="col-md-3 control-label">Username</label>
										<div class="col-md-6">
                                            <div class="input-group input-group-icon<?php if(isset($errors['username'])) echo ' has-error';?>">
                                                <div class="input-group-addon"><i class="fa fa-folder-o"></i></div>
                                                <select name="username" id="username" class="form-control populatel">
                                                    <optgroup label="Select Username">
                                                        <?php echo $op_username ?>
                                                    </optgroup>
                                                </select>
                                            </div>
										</div>
                                    </div>
                                    <div class="form-group">
										<label class="col-md-3 control-label">Permission</label>
										<div class="col-md-6">
                                            <div class="input-group input-group-icon<?php if(isset($errors['permission'])) echo ' has-error';?>">
                                                <div class="input-group-addon"><i class="fa fa-folder-o"></i></div>
                                                <select name="permission" id="permission" class="form-control populatel">
                                                    <optgroup label="Select Permission">
                                                        <?php echo $op_permission ?>
                                                    </optgroup>
                                                </select>
                                            </div>
										</div>
                                    </div>
                                    <div class="form-actions form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Save</button>
                                            <a href="<?php echo site_url('admin/menu/permission');?>" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Cancel</a>
                                        </div>
                                    </div>
                                <?php echo form_close(); ?>
							</div>
						</section>
					<!-- end: page -->
				</section>
			</div>
		<?php $this->load->view('_partials/back_page/page_footer');?>
	</section>
<?php $this->load->view('_partials/back_page/foot');?>