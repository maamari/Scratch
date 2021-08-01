<div class="card">
    <div class="card-header">
        <h3>Add Case</h3>
    </div>
    <div class="card-body">
        <?php echo form_open('add-case'); ?>
        <div class="row">
            <div class="col-md-12">
                <h3>Case Detail</h3>
                <hr>
            </div>
            <div class="col-md-3">
                <label class=" control-label">Case No <span class="text-danger">*</span></label>
                <input type="text" name="case_no" value="<?php echo $this->input->post('case_no'); ?>" class="form-control"/>
            </div>
            <div class="col-md-3">
                <label class="control-label">Case Type <span class="text-danger">*</span></label>
                <div class="form-group">
                    <select class="js-example-basic-single form-control select2" name="case_type">
                        <option value="">Select Case Type</option>
                        <?php foreach ($clients as $u) {
                          $selected = ($u['id'] == $this->input->post('case_type')) ? ' selected="selected"' : "";?>
                        <option value="<?=$u['id']?>"><?=$u['name'];?></option>
                        <?php }?>
                    </select>
                    <span class="text-danger"><?php echo form_error('case_type');?></span>
                </div>
            </div>
            <div class="col-md-3">
                <label class="control-label">Case Sub Type</label>
                <div class="form-group">
                    <select class="js-example-basic-single form-control select2" name="case_sub_type">
                        <option value="">Select Case Type</option>
                        <?php foreach ($clients as $u) {
                          $selected = ($u['id'] == $this->input->post('case_sub_type')) ? ' selected="selected"' : "";?>
                        <option value="<?=$u['id']?>"><?=$u['name'];?></option>
                        <?php }?>
                    </select>
                    <span class="text-danger"><?php echo form_error('case_sub_type');?></span>
                </div>
            </div>
            <div class="col-md-3">
                <label class="control-label">Stage of Type</label>
                <div class="form-group">
                    <select class="js-example-basic-single form-control select2" name="case_stage">
                        <option value="">Select Case Stage</option>
                        <?php foreach ($clients as $u) {
                          $selected = ($u['id'] == $this->input->post('case_stage')) ? ' selected="selected"' : "";?>
                        <option value="<?=$u['id']?>"><?=$u['name'];?></option>
                        <?php }?>
                    </select>
                    <span class="text-danger"><?php echo form_error('case_stage');?></span>
                </div>
            </div>
            <div class="col-md-3">
                <label class=" control-label">Act <span class="text-danger">*</span></label>
                <input type="text" name="act" value="<?php echo $this->input->post('act'); ?>" class="form-control"/>
                <span class="text-danger"><?php echo form_error('act');?></span>
            </div>
            <div class="col-md-3">
                <label class=" control-label">Filing Number <span class="text-danger">*</span></label>
                <input type="text" name="filing_num" value="<?php echo $this->input->post('filing_num'); ?>" class="form-control"/>
                <span class="text-danger"><?php echo form_error('filing_num');?></span>
            </div>
            <div class="col-md-3">
                <label class=" control-label">Filing Date</label>
                <input type="date" name="filing_date" value="<?php echo $this->input->post('filing_date'); ?>" class="form-control"/>
            </div>
            <div class="col-md-3">
                <label class=" control-label">Registration No. <span class="text-danger">*</span></label>
                <input type="text" name="registration_no" value="<?php echo $this->input->post('registration_no'); ?>" class="form-control"/>
                <span class="text-danger"><?php echo form_error('registration_no');?></span>
            </div>
            <div class="col-md-3">
                <label class=" control-label">Registration Date <span class="text-danger">*</span></label>
                <input type="date" name="registration_date" value="<?php echo $this->input->post('registration_date'); ?>" class="form-control"/>
                <span class="text-danger"><?php echo form_error('registration_date');?></span>
            </div>
            <div class="col-md-3">
                <label class=" control-label">First Hearing Date <span class="text-danger">*</span></label>
                <input type="date" name="fhearing_date" value="<?php echo $this->input->post('fhearing_date'); ?>" class="form-control"/>
                <span class="text-danger"><?php echo form_error('fhearing_date');?></span>
            </div>
            <div class="col-md-6">
                <label class="control-label">Description</label>
                <div class="form-group">
                    <textarea name="description" rows="3" class="form-control" style="resize: none;" placeholder="Description Here..."><?php echo $this->input->post('description'); ?></textarea>
                </div>
            </div>
            <div class="col-md-12" style="padding-bottom: 20px">
                <h3>FIR Detail</h3>
                <hr>
            </div>
            <div class="col-md-4">
                <label class=" control-label">Police Station</label>
                <input type="text" name="police_statio" value="<?php echo $this->input->post('police_statio'); ?>" class="form-control"/>
            </div>
            <div class="col-md-4">
                <label class=" control-label">FIR Number</label>
                <input type="text" name="fir_number" value="<?php echo $this->input->post('fir_number'); ?>" class="form-control"/>
            </div>
            <div class="col-md-4">
                <label class=" control-label">FIR Date</label>
                <input type="date" name="fir_date" value="<?php echo $this->input->post('fir_date'); ?>" class="form-control"/>
            </div>
            <div class="col-md-12">
                <h3>Court Detail</h3>
                <hr>
            </div>
            <div class="col-md-3">
                <label class=" control-label">Court No <span class="text-danger">*</span></label>
                <input type="text" name="court_no" value="<?php echo $this->input->post('court_no'); ?>" class="form-control"/>
                <span class="text-danger"><?php echo form_error('court_no');?></span>
            </div>
            <div class="col-md-3">
                <label class="control-label">Court Type</label>
                <div class="form-group">
                    <select class="js-example-basic-single form-control select2" name="court_type">
                        <option value="">Select Court Type</option>
                        <?php foreach ($clients as $u) {
                          $selected = ($u['id'] == $this->input->post('court_type')) ? ' selected="selected"' : "";?>
                        <option value="<?=$u['id']?>"><?=$u['name'];?></option>
                        <?php }?>
                    </select>
                    <span class="text-danger"><?php echo form_error('court_type');?></span>
                </div>
            </div>
            <div class="col-md-3">
                <label class="control-label">Court</label>
                <div class="form-group">
                    <select class="js-example-basic-single form-control select2" name="court">
                        <option value="">Select Court</option>
                        <?php foreach ($clients as $u) {
                          $selected = ($u['id'] == $this->input->post('court')) ? ' selected="selected"' : "";?>
                        <option value="<?=$u['id']?>"><?=$u['name'];?></option>
                        <?php }?>
                    </select>
                    <span class="text-danger"><?php echo form_error('court');?></span>
                </div>
            </div>
            <div class="col-md-3">
                <label class="control-label">Judge Type <span class="text-danger">*</span></label>
                <div class="form-group">
                    <select class="js-example-basic-single form-control select2" name="judge_type">
                        <option value="">Select Judge Type</option>
                        <?php foreach ($clients as $u) {
                          $selected = ($u['id'] == $this->input->post('judge_type')) ? ' selected="selected"' : "";?>
                        <option value="<?=$u['id']?>"><?=$u['name'];?></option>
                        <?php }?>
                    </select>
                    <span class="text-danger"><?php echo form_error('judge_type');?></span>
                </div>
            </div>
            <div class="col-md-3">
                <label class=" control-label">Judge Name </label>
                <input type="text" name="judge_name" value="<?php echo $this->input->post('judge_name'); ?>" class="form-control"/>
                <span class="text-danger"><?php echo form_error('judge_name');?></span>
            </div>
            <div class="col-md-3">
                <label class=" control-label">Next Hiring Date <span class="text-danger">*</span></label>
                <input type="date" name="next_hiring_date" value="<?php echo $this->input->post('next_hiring_date'); ?>" class="form-control"/>
                <span class="text-danger"><?php echo form_error('next_hiring_date');?></span>
            </div>
            <div class="col-md-6">
                <label class="control-label">Remarks</label>
                <div class="form-group">
                <textarea name="remakrs" rows="3" class="form-control" style="resize: none;" placeholder="Remakrs Here..."><?php echo $this->input->post('remakrs'); ?></textarea>
                    <span class="text-danger"><?php echo form_error('remakrs');?></span>
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
    
        

<script type="text/javascript">
    $(function() {
        $('.js-example-basic-single').select2();
    });
    function abc() {
        $('.js-example-basic-single').select2();
    }

</script>
