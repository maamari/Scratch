<div class="card">
    <div class="card-header">
        <h3>Add Invoice</h3>
    </div>
    <div class="card-body">
        <?php echo form_open('invoice-add',array("class"=>"form-horizontal")); ?>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label"><span class="text-danger">*</span>Client</label>
                    <select class="form-control" name="client_id">
                        <option value="">Select Client</option>
                        <?php foreach($clients as $c){ 
                            $selected= ($c['id'] ==$this->input->post('client_id')) ? 'selected=selected':'';
                            echo'<option value="'.$c['id'].'" '.$selected.'>'.$c['name'].'</option>';
                         } ?>
                    </select>
                    <span class="text-danger"><?php echo form_error('client_id');?></span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                <label class="control-label"><span class="text-danger">*</span>Invoice Date</label>
                <input type="date" name="invoice_date" value="<?php echo $this->input->post('invoice_date'); ?>" class="form-control" required/>
              </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                <label class="control-label"><span class="text-danger">*</span>Invoice Due Date</label>
                <input type="date" name="due_date" value="<?php echo $this->input->post('due_date'); ?>" class="form-control" required/>
              </div>
            </div>
        </div>
        <div class="row" id="more">
            <div class="col-md-3">
                <div class="form-group">
                    <label class=" control-label"><span class="text-danger">*</span>Service</label>
                    <select class="form-control service1" name="service[]" required>
                        <option value="">Select Service</option>
                        <?php foreach($services as $s){ 
                            $selected= ($s['id'] ==$this->input->post('service')) ? 'selected=selected':'';
                            echo'<option value="'.$s['id'].'" data-key="'.$s['service_rate'].'" '.$selected.'>'.$s['service_title'].'</option>';
                         } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                <label class=" control-label"><span class="text-danger">*</span>Rate</label>
                <input type="text" name="rate[]" value="<?php echo $this->input->post('rate'); ?>" class="form-control rate1" id="rate" required/>
              </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                <label class=" control-label"><span class="text-danger">*</span>Amount</label>
                <input type="text" name="paid_amount[]" value="<?php echo $this->input->post('paid_amount'); ?>" class="form-control" id="paid_amount" required/>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class=" control-label">Description</label>
                <input type="text" class="form-control" name="description[]">
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <button type="button" class="btn btn-success btn-sm addmore"><i class="fa fa-plus"></i> Add More</button>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                  <label class=" control-label">Note</label>
                  <textarea class="form-control" name="note" id="note" placeholder="Note..." rows="2" style="resize: none;"></textarea>
                </div>
            </div>
        </div>
        <div class="row" id="tax">
            <div class="col-md-2">
                <div class="form-group">
                    <label class=" control-label"><span class="text-danger">*</span>Tax Name</label>
                    <input type="text" name="tax_name[]" value="<?php echo $this->input->post('tax_name'); ?>" class="form-control" required/>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label class=" control-label"><span class="text-danger">*</span>Tax Value</label>
                    <input type="text" name="tax[]" value="<?php echo $this->input->post('tax'); ?>" class="form-control" required/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <button type="button" class="btn btn-success btn-sm addtax"><i class="fa fa-plus"></i> Add More</button>
                </div>
            </div>
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
    let count=1;
    $(function() {
        $('.addmore').click(function(){
            count++;
            $('#more').append('<div class="col-md-3"><div class="form-group"><select class="form-control service'+count+'" name="service[]"><option value="">Select Service</option>'+
                        '<?php foreach($services as $s){ 
                            $selected= ($s['id'] ==$this->input->post('service')) ? 'selected=selected':'';
                            echo'<option value="'.$s['id'].'" data-key="'.$s['service_rate'].'" '.$selected.'>'.$s['service_title'].'</option>';
                         } ?>'+
                    '</select></div></div>'+
            '<div class="col-md-3"><div class="form-group"><input type="text" name="rate[]" class="form-control rate'+count+'" placeholder="Rate"/></div></div>'+
            '<div class="col-md-3"><div class="form-group"><input type="text" name="paid_amount[]" class="form-control" placeholder="Amount"/></div></div>'+
            '<div class="col-md-3"><div class="form-group"><input type="text" class="form-control" name="description[]"  placeholder="Description"/></div></div>');
            $('.service'+count).change(function(){
                let service_rate = $('option:selected', this).attr('data-key');
                $('.rate'+count).val(service_rate);
                console.log('service rate: ',service_rate);

            });
        });
        $('.addtax').click(function(){
            $('#tax').append('<div class="col-md-2"><div class="form-group"><label class=" control-label">Tax Name</label><input type="text" name="tax_name[]" class="form-control" placeholder="Tax Name"/></div></div>'+
                '<div class="col-md-2"><div class="form-group"><label class=" control-label">Tax Value</label><input type="text" name="tax[]" class="form-control" placeholder="Tax  Value"/></div></div>');
        });
        $('.service'+count).change(function(){
            let service_rate = $('option:selected', this).attr('data-key');
            $('.rate'+count).val(service_rate);
            console.log('service rate: ',service_rate);

        });
    })
</script>