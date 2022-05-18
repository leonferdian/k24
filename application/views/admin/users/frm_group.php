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
						
								<h2 class="panel-title">Group</h2>
							</header>
							<div class="panel-body">
                                <?php echo form_open('admin/users/groups/'.(isset($forms['id'])?'edit/'.$forms['id']:'add'), array('class'=>'form'));?>
									<div class="form-group">
										<label class="col-md-3 control-label">Group Name</label>
										<div class="col-md-6">
                                            <div class="input-group btn-group<?php if(isset($errors['group_name'])) echo ' has-error';?>">
                                                <div class="input-group-addon"><i class="fa fa-font"></i></div>
                                                <input type="text" id="group_name" name="group_name" class="form-control" value="<?php if(isset($forms['group_name'])) echo html_escape($forms['group_name']);?>">
                                            </div>
										</div>
                                    </div>
                                    <div class="form-group">
										<label class="col-md-3 control-label">Group Description</label>
										<div class="col-md-6">
                                            <div class="input-group btn-group<?php if(isset($errors['group_desc'])) echo ' has-error';?>">
                                                <div class="input-group-addon"><i class="fa fa-folder-o"></i></div>
                                                <input type="text" class="form-control" id="group_desc" name="group_desc" placeholder="" value="<?php if (isset($forms['group_desc'])) echo $forms['group_desc']; ?>">
                                                <?php if(isset($errors['group_desc'])) echo '<p class="help-block">'.$errors['group_desc'].'</p>';?>
                                            </div>
										</div>
                                    </div>
                                    <div class="form-actions form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Save</button>
                                            <a href="<?php echo site_url('admin/users/groups');?>" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Cancel</a>
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