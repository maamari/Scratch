<div class="row">
    <div class="col-md-12">
        <h2>Add results Information</h2>
    </div>
</div>
 
<?php echo form_open('results/add'); ?>
<div class="row">
      <div class="col-md-6 col-sm-6">
        <label>Patient <span class="required">*</span></label>
        <select class="form-control select2" name="patient_id" id="patient_id">
       <option value="">Select Patient</option>
        <?php foreach ($patients as $u) {
          $selected = ($u['id'] == $this->input->post('patient_id')) ? ' selected="selected"' : "";?>
                        <option value="<?=$u['id']?>"><?=$u['name']." ".$u['surname']." <strong> || Passport Number:</strong> ".$u['passport_no']?></option>
                        <?php }?>
        </select>
             <span class="text-danger"><?php echo form_error('patient_id');?></span>
                            </div>
    <div class="col-md-6">
        <label for="result" class=" control-label"><span class="text-danger">*</span>Result</label>
        <input type="text" name="result" value="<?php echo $this->input->post('result'); ?>" class="form-control" id="result" required />
        <span class="text-danger"><?php echo form_error('result');?></span>
    </div>
     <div class="col-md-6">
        <label for="result" class=" control-label"><span class="text-danger">*</span>Date Received</label>
        <input type="Date" name="date_received" value="<?php echo $this->input->post('date_received'); ?>" class="form-control" id="date_received" required />
        <span class="text-danger"><?php echo form_error('date_received');?></span>
    </div>
      <div class="col-md-6">
        <label for="time_received" class=" control-label"><span class="text-danger">*</span>Time Received</label>
        <input type="Time" name="time_received" value="<?php echo $this->input->post('time_received'); ?>" class="form-control" id="time_received" required />
        <span class="text-danger"><?php echo form_error('time_received');?></span>
    </div>

      <div class="col-md-6">
        <label for="result" class=" control-label"><span class="text-danger">*</span>Date Result Received</label>
        <input type="Date" name="date_result_received" value="<?php echo $this->input->post('date_result_received'); ?>" class="form-control" id="date_result_received" required />
        <span class="text-danger"><?php echo form_error('date_result_received');?></span>
    </div>
      <div class="col-md-6">
        <label for="time_result_received" class=" control-label"><span class="text-danger">*</span>Time Result Received</label>
        <input type="Time" name="time_result_received" value="<?php echo $this->input->post('time_result_received'); ?>" class="form-control" id="time_result_received" required />
        <span class="text-danger"><?php echo form_error('time_result_received');?></span>
    </div>
   
     
    
   
</div>
<br>
<div class="row">
    <div class="col-md-12">
      
            <button type="submit" class="btn btn-success" style="width: 100%">Save</button>
       
    </div>
</div>
<?php echo form_close(); ?>

