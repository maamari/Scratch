<div class="card">
    <div class="card-header">
        <h3>View Sales Tex Client</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <label class=" control-label">Business Name</label>
                <div class="form-group">
                    <input type="text" name="business_name" value="<?php echo ($this->input->post('business_name') ? $this->input->post('business_name') : $sales_tax['business_name']); ?>" class="form-control" />
                    <span class="text-danger"><?php echo form_error('business_name');?></span>
                </div>
            </div>
            <div class="col-md-3">
                <label class=" control-label"><span class="text-danger">*</span>Name</label>
                <div class="form-group">
                    <input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $sales_tax['name']); ?>" class="form-control" />
                    <span class="text-danger"><?php echo form_error('name');?></span>
                </div>
            </div>
            <div class="col-md-3">
                <label class=" control-label"><span class="text-danger">*</span>Registration No</label>
                <div class="form-group">
                    <input type="text" name="registration_no" value="<?php echo ($this->input->post('registration_no') ? $this->input->post('registration_no') : $sales_tax['registration_no']); ?>" class="form-control" />
                    <span class="text-danger"><?php echo form_error('registration_no');?></span>
                </div>
            </div>
            <div class="col-md-3">
                <label class=" control-label">Password</label>
                <div class="form-group">
                    <input type="text" name="password" class="form-control"/>
                    <span class="text-danger"><?php echo form_error('password');?></span>
                </div>
            </div>
            <div class="col-md-3">
                <label class=" control-label"><span class="text-danger">*</span>Pin Code</label>
                <div class="form-group">
                    <input type="text" name="pin_code" value="<?php echo ($this->input->post('pin_code') ? $this->input->post('pin_code') : $sales_tax['pin_code']); ?>" class="form-control" />
                    <span class="text-danger"><?php echo form_error('pin_code');?></span>
                </div>
            </div>
            <div class="col-md-3">
                <label class="control-label"><span class="text-danger">*</span> Year</label>
                <div class="form-group">
                    <input type="text" name="year" value="<?php echo ($this->input->post('year') ? $this->input->post('year') : $sales_tax['year']); ?>" class="form-control"/>
                </div>
            </div>
            <div class="col-md-3" id="month">
                <label class=" control-label"><span class="text-danger">*</span>Month</label>
                <?php $m = explode(',', $sales_tax['month']);
                    foreach ($m as $mon) {?>
                <div class="form-group">
                    <select class="form-control" class="form-control" name="month[]">
                        <option>Select</option>
                        <?php $months = array(
                            'January' => 'jan',
                            'February' => 'feb',
                            'March' => 'march',
                            'April' => 'april',
                            'May' => 'may',
                            'June' => 'june',
                            'July' => 'july',
                            'August' => 'aug',
                            'September' => 'sept',
                            'October' => 'oct',
                            'November' => 'nov',
                            'December' => 'dec'
                        );
                        foreach ($months as $key => $v) {
                             $selected='';
                                if ($v==$mon) {
                                    $selected = 'selected';
                                }
                            echo'<option value="'.$v.'" '.$selected.'>'.$key.'</option>';
                        }?>
                    </select>
                </div>
                <?php }?>
            </div>
            <div class="col-md-3" id="tax">
                <label class=" control-label"><span class="text-danger">*</span>Tax</label>
                <?php $tax = explode(',', $sales_tax['tax_amount']);
                    foreach ($tax as $t) {?>
                <div class="form-group">
                    <input type="text" name="tax_amount[]" value="<?=$t?>" class="form-control" required/>
                </div>
                <?php }?>
            </div>
        </div>
        <div class="row" id="addmore">
            <?php if (!empty($sales_tax['feilds'])) {
                foreach($sales_tax['feilds'] as $key =>$v){
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
    </div>
</div>    

<script type="text/javascript">
    $(function() {
        $('.js-example-basic-single').select2();
        $('.dual_listbox').select2();
    });
    function abc() {
        $('.js-example-basic-single').select2();
    }

</script>
