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
						
								<h2 class="panel-title">Users</h2>
							</header>
							<div class="panel-body">
								<?php echo form_open('admin/users/'.(isset($forms['id'])?'edit/'.$forms['id']:'add'), array('class'=>'form-horizontal form-bordered', 'id'=>'submit_form'));?>
									<div class="form-group">
										<label for="username" class="col-md-3 control-label">Username</label>
										<div class="col-md-6">
											<div class="input-group input-group-icon<?php if(isset($errors['username'])) echo ' has-error';?>">
												<span class="input-group-addon">
													<span class="icon"><i class="fa fa-user"></i></span>
												</span>
												<input type="text" name="username" class="form-control" placeholder="" value="<?php if(isset($forms['username'])) echo html_escape($forms['username']);?>">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="first_name" class="col-md-3 control-label">Firstname</label>
										<div class="col-md-6">
											<div class="input-group input-group-icon<?php if(isset($errors['first_name'])) echo ' has-error';?>">
												<span class="input-group-addon">
													<span class="icon"><i class="fa fa-paw"></i></span>
												</span>
												<input type="text" name="first_name" class="form-control" placeholder="" value="<?php if(isset($forms['first_name'])) echo html_escape($forms['first_name']);?>">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="last_name" class="col-md-3 control-label">Lastname</label>
										<div class="col-md-6">
											<div class="input-group input-group-icon<?php if(isset($errors['last_name'])) echo ' has-error';?>">
												<span class="input-group-addon">
													<span class="icon"><i class="fa fa-qq"></i></span>
												</span>
												<input type="text" name="last_name" class="form-control" placeholder="" value="<?php if(isset($forms['last_name'])) echo html_escape($forms['last_name']);?>">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="company" class="col-md-3 control-label">Company</label>
										<div class="col-md-6">
											<div class="input-group input-group-icon<?php if(isset($errors['company'])) echo ' has-error';?>">
												<span class="input-group-addon">
													<span class="icon"><i class="fa fa-building-o"></i></span>
												</span>
												<input type="text" name="company" class="form-control" placeholder="" value="<?php if(isset($forms['company'])) echo html_escape($forms['company']);?>">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="email" class="col-md-3 control-label">Email</label>
										<div class="col-md-6">
											<div class="input-group input-group-icon<?php if(isset($errors['email'])) echo ' has-error';?>">
												<span class="input-group-addon">
													<span class="icon"><i class="fa fa-envelope"></i></span>
												</span>
												<input type="text" name="email" class="form-control" placeholder="" value="<?php if(isset($forms['email'])) echo html_escape($forms['email']);?>">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="phone" class="col-md-3 control-label">Phone</label>
										<div class="col-md-6">
											<div class="input-group input-group-icon<?php if(isset($errors['phone'])) echo ' has-error';?>">
												<span class="input-group-addon">
													<span class="icon"><i class="fa fa-phone-square"></i></span>
												</span>
												<input type="text" name="phone" class="form-control" placeholder="" value="<?php if(isset($forms['phone'])) echo html_escape($forms['phone']);?>">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="password" class="col-md-3 control-label">Password</label>
										<div class="col-md-6">
											<div class="input-group input-group-icon<?php if(isset($errors['password'])) echo ' has-error';?>">
												<span class="input-group-addon">
													<span class="icon"><i class="fa fa-key"></i></span>
												</span>
												<input type="password" name="password" class="form-control" placeholder="" value="">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="password_confirm" class="col-md-3 control-label">Konfirmasi Password</label>
										<div class="col-md-6">
											<div class="input-group input-group-icon<?php if(isset($errors['password_confirm'])) echo ' has-error';?>">
												<span class="input-group-addon">
													<span class="icon"><i class="fa fa-key"></i></span>
												</span>
												<input type="password" name="password_confirm" class="form-control" placeholder="" value="">
											</div>
										</div>
									</div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <label>
                                                    <input type="checkbox" name="active" value="1" class="flat-red"<?php if(isset($forms['status']) && $forms['status']) echo ' checked';?>>
                                                    Active
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-6">
											<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Save</button>
											<a href="<?php echo site_url('admin/users');?>" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Cancel</a>
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