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
						
								<h2 class="panel-title">Menu</h2>
							</header>
							<div class="panel-body">
                                <?php echo form_open('admin/menu/'.(isset($forms['id'])?'edit/'.$forms['id']:'add'), array('class'=>'form-horizontal form-bordered', 'id'=>'submit_form'));?>
									<div class="form-group">
										<label class="col-md-3 control-label">Title</label>
										<div class="col-md-6">
                                            <div class="input-group btn-group<?php if(isset($errors['title'])) echo ' has-error';?>">
                                                <div class="input-group-addon"><i class="fa fa-font"></i></div>
                                                <input type="text" id="title" name="title" placeholder="Title" class="form-control" value="<?php if(isset($forms['title'])) echo html_escape($forms['title']);?>">
                                            </div>
										</div>
                                    </div>
                                    <div class="form-group">
										<label class="col-md-3 control-label">Parent</label>
										<div class="col-md-6">
                                            <div class="input-group btn-group<?php if(isset($errors['parent_id'])) echo ' has-error';?>">
                                                <div class="input-group-addon"><i class="fa fa-folder-o"></i></div>
                                                <select name="parent_id" id="parent_id" class="form-control populatel">
                                                    <optgroup label="Select parent menu">
                                                        <?php echo $op_parents ?>
                                                    </optgroup>
                                                </select>
                                            </div>
										</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Url</label>
                                        <div class="col-md-6">
                                            <div class="input-group btn-group<?php if(isset($errors['url'])) echo ' has-error';?>">
                                                <div class="input-group-addon"><i class="fa fa-chain"></i></div>
                                                <input type="text" id="url" name="url" class="form-control" placeholder="url" value="<?php if(isset($forms['url'])) echo html_escape($forms['url']);?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Icon</label>
                                        <div class="col-md-6">
                                            <div class="input-group btn-group<?php if(isset($errors['icon'])) echo ' has-error';?>">
                                                <div class="input-group-addon"><i class="fa fa-smile-o"></i></div>
                                                <input name="icon" data-placement="bottomRight" class="form-control icp icp-auto" placeholder="icon" value="<?php if(isset($forms['icon'])) echo html_escape($forms['icon']);?>" type="text"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <label>
                                                    <input type="checkbox" name="status" value="1" class="flat-red"<?php if(isset($forms['status']) && $forms['status']) echo ' checked';?>>
                                                    Active
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Save</button>
                                            <a href="<?php echo site_url('admin/menu');?>" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Cancel</a>
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