<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <?php $this->load->view('_partials/back_page/login/head');?>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<!-- <a href="/" class="logo pull-left">
					<img src="<?php echo site_url('assets/images/logo/logo@2x.png') ?>" height="54" alt="Porto Admin" />
				</a> -->

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
					</div>
					<div class="panel-body">
                        <?php echo form_open("login", array('class'=>'form'));?>
							<div class="form-group mb-lg">
								<label>Username</label>
								<div class="input-group input-group-icon">
									<input name="identity" id="identity" type="text" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Password</label>
								</div>
								<div class="input-group input-group-icon">
									<input type="password" name="password" id="password" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
                                        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
										<label for="RememberMe">Remember Me</label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
								</div>
							</div>

                        <?php echo form_close();?>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright 2020. Creative Digiads All rights reserved.</p>
			</div>
		</section>
        <!-- end: page -->
    <?php $this->load->view('_partials/back_page/login/foot');?>