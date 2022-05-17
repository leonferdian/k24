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
            <div class="input-group<?php if(isset($errors['title'])) echo ' has-error';?>">
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
                        <div class="card-header">Users</div>
                            <div class="card-body card-block">
                                <?php echo form_open('admin/users/'.(isset($forms['id'])?'edit/'.$forms['id']:'add'), array('class'=>'form-horizontal'));?>
									<div class="form-group<?php if(isset($errors['username'])) echo ' has-error';?>">
										<label for="username" class="col-sm-3 control-label">Username</label>
										<div class="input-group<?php if(isset($errors['username'])) echo ' has-error';?>">
											<input type="text" name="username" class="form-control" placeholder="" value="<?php if(isset($forms['username'])) echo html_escape($forms['username']);?>">
											<?php if(isset($errors['username'])) echo '<p class="help-block">'.$errors['username'].'</p>';?>
										</div>
									</div>
									<div class="form-group<?php if(isset($errors['first_name'])) echo ' has-error';?>">
										<label for="first_name" class="col-sm-3 control-label">Firstname</label>
										<div class="input-group<?php if(isset($errors['first_name'])) echo ' has-error';?>">
											<input type="text" name="first_name" class="form-control" placeholder="" value="<?php if(isset($forms['first_name'])) echo html_escape($forms['first_name']);?>">
											<?php if(isset($errors['first_name'])) echo '<p class="help-block">'.$errors['first_name'].'</p>';?>
										</div>
									</div>
									<div class="form-group<?php if(isset($errors['last_name'])) echo ' has-error';?>">
										<label for="last_name" class="col-sm-3 control-label">Lastname</label>
										<div class="input-group<?php if(isset($errors['last_name'])) echo ' has-error';?>">
											<input type="text" name="last_name" class="form-control" placeholder="" value="<?php if(isset($forms['last_name'])) echo html_escape($forms['last_name']);?>">
											<?php if(isset($errors['last_name'])) echo '<p class="help-block">'.$errors['last_name'].'</p>';?>
										</div>
									</div>
									<div class="form-group<?php if(isset($errors['company'])) echo ' has-error';?>">
										<label for="company" class="col-sm-3 control-label">Company</label>
										<div class="input-group<?php if(isset($errors['company'])) echo ' has-error';?>">
											<input type="text" name="company" class="form-control" placeholder="" value="<?php if(isset($forms['company'])) echo html_escape($forms['company']);?>">
											<?php if(isset($errors['company'])) echo '<p class="help-block">'.$errors['company'].'</p>';?>
										</div>
									</div>
									<div class="form-group<?php if(isset($errors['email'])) echo ' has-error';?>">
										<label for="email" class="col-sm-3 control-label">Email</label>
										<div class="input-group<?php if(isset($errors['email'])) echo ' has-error';?>">
											<input type="text" name="email" class="form-control" placeholder="" value="<?php if(isset($forms['email'])) echo html_escape($forms['email']);?>">
											<?php if(isset($errors['email'])) echo '<p class="help-block">'.$errors['email'].'</p>';?>
										</div>
									</div>
									<div class="form-group<?php if(isset($errors['phone'])) echo ' has-error';?>">
										<label for="phone" class="col-sm-3 control-label">Phone</label>
										<div class="input-group<?php if(isset($errors['phone'])) echo ' has-error';?>">
											<input type="text" name="phone" class="form-control" placeholder="" value="<?php if(isset($forms['phone'])) echo html_escape($forms['phone']);?>">
											<?php if(isset($errors['phone'])) echo '<p class="help-block">'.$errors['phone'].'</p>';?>
										</div>
									</div>
									<div class="form-group<?php if(isset($errors['password'])) echo ' has-error';?>">
										<label for="password" class="col-sm-3 control-label">Password</label>
										<div class="input-group<?php if(isset($errors['password'])) echo ' has-error';?>">
											<input type="password" name="password" class="form-control" placeholder="" value="">
											<?php if(isset($errors['password'])) echo '<p class="help-block">'.$errors['password'].'</p>';?>
										</div>
									</div>
									<div class="form-group<?php if(isset($errors['password_confirm'])) echo ' has-error';?>">
										<label for="password_confirm" class="col-sm-3 control-label">Konfirmasi Password</label>
										<div class="input-group<?php if(isset($errors['password_confirm'])) echo ' has-error';?>">
											<input type="password" name="password_confirm" class="form-control" placeholder="" value="">
											<?php if(isset($errors['password_confirm'])) echo '<p class="help-block">'.$errors['password_confirm'].'</p>';?>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-5 col-sm-offset-3">
											<label>
												<input type="checkbox" name="active" value="1" class="flat-red"<?php if(isset($forms['active']) && $forms['active']) echo ' checked';?>>
												 Active
											</label>
										</div>
									</div>
                                    <div class="form-actions form-group">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Save</button>
                                        <a href="<?php echo site_url('admin/users');?>" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Cancel</a>
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
