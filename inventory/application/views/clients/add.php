<div class="card">
    <div class="card-header">
        <h3>Add Client</h3>
    </div>
    <div class="card-body">
        <?php echo form_open('add-client'); ?>
        <div class="row">
            <div class="col-md-6">
                <label for="name" class=" control-label"><span class="text-danger">*</span>Name</label>
                <input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" required/>
                <span class="text-danger"><?php echo form_error('name');?></span>
            </div>
            <div class="col-md-6">
                <label for="number" class=" control-label">Number</label>
                <input type="text" name="number" value="<?php echo $this->input->post('number'); ?>" class="form-control" id="number" />
            </div>
            <div class="col-md-6">
                <label for="email" class=" control-label">Email</label>
                <input type="email" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
            </div>
            <div class="col-md-6">
                <label for="mobile" class=" control-label"><span class="text-danger">*</span>Mobile Number</label>
                    <input type="text" name="mobile" value="<?php echo $this->input->post('mobile'); ?>" class="form-control" id="mobile" />
                    <span class="text-danger"><?php echo form_error('mobile');?></span>
            </div>
            <div class="col-md-12">
                <label class="control-label"><span class="text-danger">*</span>Address</label>
                <div class="form-group">
                    <textarea name="address" rows="4" class="form-control" style="resize: none;" placeholder="Address Here..."><?php echo $this->input->post('address'); ?></textarea>
                    <span class="text-danger"><?php echo form_error('address');?></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>  