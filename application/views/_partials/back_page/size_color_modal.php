  <!-- The Modal -->
  <div class="modal fade" id="form_modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add <?php echo $table ?></h4>
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
                <?php if ($table == 'size'): ?>
                <div class="form-group">
					<label class="col-md-3 control-label">Number</label>
					<div class="col-md-6">
                        <div class="input-group btn-group<?php if(isset($errors['number'])) echo ' has-error';?>">
                            <div class="input-group-addon"><i class="fa fa-font"></i></div>
                            <input type="text" id="number" name="number" placeholder="Number" class="form-control">
                        </div>
					</div>
                </div>
                <?php else: ?>
                <div class="form-group">
					<label class="col-md-3 control-label">Hex</label>
					<div class="col-md-6">
                        <div class="input-group btn-group<?php if(isset($errors['hex'])) echo ' has-error';?>">
                            <div class="input-group-addon"><i class="fa fa-tint"></i></div>
                            <input type="text" id="hex" name="hex" placeholder="#8fff00" data-plugin-colorpicker class="colorpicker-rgba form-control"  data-horizontal="true"/>
                        </div>
					</div>
                </div>
                <?php endif; ?>
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