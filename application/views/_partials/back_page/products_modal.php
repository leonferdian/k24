  <!-- The Modal -->
  <div class="modal fade" id="form_modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Category</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <?php echo form_open($action_add, array('class'=>'form-horizontal form-bordered', 'id'=>'submit_form'));?>
				<div class="form-group">
					<label class="col-md-3 control-label">Name</label>
					<div class="col-md-6">
                        <div class="input-group btn-group">
                            <div class="input-group-addon"><i class="fa fa-font"></i></div>
                            <input type="text" id="name" name="name" placeholder="Name" class="form-control">
                        </div>
				    </div>
                </div>
                <div class="form-group">
					<label class="col-md-3 control-label">Category</label>
					<div class="col-md-6">
                        <div class="input-group btn-group">
                        <div class="input-group-addon"><i class="fa fa-folder-o"></i></div>
                            <select name="category" id="category" class="form-control populatel">
                                <optgroup label="Select parent menu">
                                    <?php echo $op_category ?>
                                </optgroup>
                            </select>
                        </div>
					</div>
                </div>
                <div class="form-group">
					<label class="col-md-3 control-label">Brand</label>
					<div class="col-md-6">
                        <div class="input-group btn-group">
                        <div class="input-group-addon"><i class="fa fa-folder-o"></i></div>
                            <select name="brand" id="brand" class="form-control populatel">
                                <optgroup label="Select parent menu">
                                    <?php echo $op_brand ?>
                                </optgroup>
                            </select>
                        </div>
					</div>
                </div>
                <div class="form-group">
					<label class="col-md-3 control-label">Size</label>
					<div class="col-md-6">
                        <div class="input-group btn-group">
                        <div class="input-group-addon"><i class="fa fa-folder-o"></i></div>
                            <select name="size" id="size" class="form-control populatel">
                                <optgroup label="Select parent menu">
                                    <?php echo $op_size ?>
                                </optgroup>
                            </select>
                        </div>
					</div>
                </div>
                <div class="form-group">
					<label class="col-md-3 control-label">Color</label>
					<div class="col-md-6">
                        <div class="input-group btn-group">
                        <div class="input-group-addon"><i class="fa fa-folder-o"></i></div>
                            <select name="color" id="color" class="form-control populatel">
                                <optgroup label="Select parent menu">
                                    <?php echo $op_color ?>
                                </optgroup>
                            </select>
                        </div>
					</div>
                </div>
                <div class="form-group">
					<label class="col-md-3 control-label">Single Price (Rp)</label>
					<div class="col-md-6">
                        <div class="input-group btn-group">
                            <div class="input-group-addon"><i>Rp.</i></div>
                            <input type="text" id="single_price" name="single_price" placeholder="0" class="form-control">
                        </div>
					</div>
                </div>
                <div class="form-group">
					<label class="col-md-3 control-label">Bundle Price (Rp)</label>
					<div class="col-md-6">
                        <div class="input-group btn-group">
                            <div class="input-group-addon"><i>Rp.</i></div>
                            <input type="text" id="bundle_price" name="bundle_price" placeholder="0" class="form-control">
                        </div>
					</div>
                </div>
                <div class="form-group">
					<label class="col-md-3 control-label">Promo Code</label>
					<div class="col-md-6">
                        <div class="input-group btn-group">
                            <div class="input-group-addon"><i class="fa fa-font"></i></div>
                            <input type="text" id="promo_code" name="promo_code" placeholder="Insert Promo Code" class="form-control">
                        </div>
					</div>
                </div>
                <div class="form-group">
					<label class="col-md-3 control-label">Promo Stock</label>
					<div class="col-md-6">
                        <div class="input-group btn-group">
                            <div class="input-group-addon"><i class="fa fa-font"></i>></div>
                            <input type="text" id="promo_stock" name="promo_stock" placeholder="0" class="form-control">
                        </div>
					</div>
                </div>
                <div class="form-group">
						<label class="col-md-3 control-label">Stock</label>
						<div class="col-md-6">
                        <div class="input-group btn-group">
                            <div class="input-group-addon"><i class="fa fa-font"></i></div>
                            <input type="text" id="stock" name="stock" placeholder="0" class="form-control">
                        </div>
					</div>
                </div>
                <div class="form-group">
					<label class="col-md-3 control-label">Picture</label>
					<div class="col-md-9">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
							<div class="input-append">
							<div class="uneditable-input">
								<i class="fa fa-file fileupload-exists"></i>
								<span class="fileupload-preview"></span>
							</div>
							<span class="btn btn-default btn-file">
							    <span class="fileupload-exists">Change</span>
							    <span class="fileupload-new">Select file</span>
								<input type="file" name="picture"/>
							</span>
							<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
							</div>
						</div>
					</div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <label>
                                <input type="checkbox" name="status" value="1" class="flat-red"<?php if(isset($action) && $action == 'edit') echo ' checked';?>>
                                Active
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-actions form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Save</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-ban"></i> Cancel</button>
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        </div>
        
      </div>
    </div>
  </div>