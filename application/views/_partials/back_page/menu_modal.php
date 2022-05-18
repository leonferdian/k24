  <!-- The Modal -->
  <div class="modal fade" id="form_modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Menu</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <?php echo form_open($action_add, array('class'=>'form-horizontal form-bordered', 'id'=>'submit_form'));?>
				<div class="form-group">
					<label class="col-md-3 control-label">Title</label>
					<div class="col-md-6">
                        <div class="input-group btn-group">
                            <div class="input-group-addon"><i class="fa fa-font"></i></div>
                            <input type="text" id="title" name="title" placeholder="Title" class="form-control">
                        </div>
				    </div>
                </div>
                <div class="form-group">
					<label class="col-md-3 control-label">Parent</label>
					<div class="col-md-6">
                        <div class="input-group btn-group">
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
                        <div class="input-group btn-group">
                        <div class="input-group-addon"><i class="fa fa-chain"></i></div>
                            <input type="text" id="url" name="url" class="form-control" placeholder="url">
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