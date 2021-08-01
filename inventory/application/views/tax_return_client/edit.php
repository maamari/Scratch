<div class="card">
    <div class="card-header">
        <h3>Edit Tex Retrun</h3>
    </div>
    <div class="card-body">
        <?php echo form_open('edit-tax/'.$tax_return_client['id'],array("class"=>"form-horizontal")); ?>
        <div class="row" id="addmore">
            <div class="col-md-4" >
                <label class="control-label">Select Client</label>
                <div class="form-group">
                    <select class="js-example-basic-single form-control select2" onmouseenter="abc()" name="client_id" id="client_id" value="<?php echo $this->input->post('client_id'); ?>">
                       <option value="">Select Client</option>
                        <?php foreach ($clients as $u) {

                              $selected = ($u['id'] == $tax_return_client['client_id']) ? ' selected="selected"' : "";?>
                        <option value="<?=$u['id']?>" <?=$selected?>><?=$u['name']?></option>
                    <?php }?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <label for="category" class=" control-label">Category</label>
                <input type="text" name="category" value="<?php echo ($this->input->post('category') ? $this->input->post('category') : $tax_return_client['category']); ?>" class="form-control" id="category" />
            </div>
            <div class="col-md-4">
                <label for="file_loc" class=" control-label">File Location</label>
                <input type="text" name="file_loc" value="<?php echo ($this->input->post('file_loc') ? $this->input->post('file_loc') : $tax_return_client['file_loc']); ?>" class="form-control" id="file_loc" />
            </div>
              
            <div class="col-md-4">
                <label class="control-label"><span class="text-danger">*</span>Status</label>
                <select class="form-control" name="status">
                    <option <?php if ($tax_return_client['status'] == "pending") echo "selected";?> value="pending">Pending</option>
                    <option <?php if ($tax_return_client['status'] == "clear") echo "selected";?> value="clear">Clear</option>
                    <option <?php if ($tax_return_client['status'] == "upcoming") echo "selected";?> value="upcoming">Upcoming</option>
                </select>
                <span class="text-danger"><?php echo form_error('q1');?></span>
            </div>
            <div class="col-md-4">
                <label for="status2" class=" control-label"><span class="text-danger">*</span>Status2</label>
                    <input type="text" name="status2" value="<?php echo ($this->input->post('status2') ? $this->input->post('status2') : $tax_return_client['status2']); ?>" class="form-control" id="status2" />
                    <span class="text-danger"><?php echo form_error('status2');?></span>
            </div>

            <div class="col-md-4">
                <label for="ntn" class=" control-label"><span class="text-danger">*</span>NTN</label>
                    <input type="text" name="ntn" value="<?php echo ($this->input->post('ntn') ? $this->input->post('ntn') : $tax_return_client['ntn']); ?>" class="form-control" id="ntn" />
                    <span class="text-danger"><?php echo form_error('ntn');?></span>
            </div>
             <div class="col-md-4">
                <label for="strn" class=" control-label"><span class="text-danger">*</span>STRN/ Reference</label>
                    <input type="text" name="strn" value="<?php echo ($this->input->post('strn') ? $this->input->post('strn') : $tax_return_client['strn']); ?>" class="form-control" id="strn" />
                    <span class="text-danger"><?php echo form_error('strn');?></span>
            </div>
            <div class="col-md-4">
                <label for="contact" class=" control-label"><span class="text-danger">*</span>Contact No</label>
                    <input type="text" name="contact" value="<?php echo ($this->input->post('contact') ? $this->input->post('contact') : $tax_return_client['contact']); ?>" class="form-control" id="contact" />
                    <span class="text-danger"><?php echo form_error('contact');?></span>
            </div>
            <div class="col-md-4">
                <label for="reg_no" class=" control-label"><span class="text-danger">*</span>User ID/ Reg No</label>
                    <input type="text" name="reg_no" value="<?php echo ($this->input->post('reg_no') ? $this->input->post('reg_no') : $tax_return_client['reg_no']); ?>" class="form-control" id="reg_no" />
                    <span class="text-danger"><?php echo form_error('reg_no');?></span>
            </div>
            <div class="col-md-4">
                <label for="password" class=" control-label">Password</label>
                    <input type="text" name="password" class="form-control" value="<?=$tax_return_client['password']?>" />
                    <span class="text-danger"><?php echo form_error('password');?></span>
            </div>
            <div class="col-md-3">
                <label for="pin_code" class=" control-label"><span class="text-danger">*</span>Pin Code</label>
                    <input type="text" name="pin_code" value="<?php echo ($this->input->post('pin_code') ? $this->input->post('pin_code') : $tax_return_client['pin_code']); ?>" class="form-control" id="pin_code" />
                    <span class="text-danger"><?php echo form_error('pin_code');?></span>
            </div>
            <div class="col-md-4">
                <label for="email" class=" control-label"><span class="text-danger">*</span>Email</label>
                    <input type="email" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $tax_return_client['email']); ?>" class="form-control" id="email" />
                    <span class="text-danger"><?php echo form_error('email');?></span>
            </div>
            <div class="col-md-4">
                <label for="email_password" class=" control-label">Email Password</label>
                    <input type="text" name="email_password" class="form-control" value="<?=$tax_return_client['email_password']?>" />
                    <span class="text-danger"><?php echo form_error('email_password');?></span>
            </div>
            <div class="col-md-4">
                <label for="business_name" class=" control-label"><span class="text-danger">*</span>Business Name</label>
                    <input type="text" name="business_name" value="<?php echo ($this->input->post('business_name') ? $this->input->post('business_name') : $tax_return_client['business_name']); ?>" class="form-control" id="business_name" />
                    <span class="text-danger"><?php echo form_error('business_name');?></span>
            </div>
            <div class="col-md-4">
                <label for="dob" class=" control-label"><span class="text-danger">*</span>Date of Birth</label>
                    <input type="Date" name="dob" value="<?=$tax_return_client['dob']?>" class="form-control" id="dob" />
                    <span class="text-danger"><?php echo form_error('dob');?></span>
            </div>
            <div class="col-md-12">
                <label class="control-label"><span class="text-danger">*</span>Address</label>
                <div class="form-group">
                <textarea name="address" rows="4" class="form-control" style="resize: none;" placeholder="Address Here..."><?php echo ($this->input->post('address') ? $this->input->post('address') : $tax_return_client['address']); ?></textarea>
                    <span class="text-danger"><?php echo form_error('address');?></span>
                </div>
            </div>
            <?php if (!empty($tax_return_client['feilds'])) {
                foreach($tax_return_client['feilds'] as $key =>$v){
                    $count = $key+1;
                echo'<div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">Feild'.$count.'</label>
                        <input type="text" name="feild[]" value="'.$v['feild_value'].'" class="form-control"/>
                    </div>
                    </div>';
                }
            } ?>
        </div>
        <div class="row">
            <div class="col-md-4">
                <button type="button" class="btn btn-info" id="morefeild"><i class="fa fa-plus"></i> more field</button>
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
    let count=<?=$feilds?>;
    $(function() {
        $('#morefeild').click(function(){
            count++;
            console.log('click');
            $('#addmore').append('<div class="col-md-3"><div class="form-group"><label class="control-label">Feild'+count+'</label><input type="text" name="feild[]" class="form-control"/></div></div>');
        });
        $('.js-example-basic-single').select2();
        $('.dual_listbox').select2();
    });
    function abc() {
        $('.js-example-basic-single').select2();
    }

</script>
