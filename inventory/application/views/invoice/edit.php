<div class="card">
    <div class="card-header">
        <h3>Edit Sales Tex Client</h3>
    </div>
    <div class="card-body">
        <?php echo form_open('invoice-edit/'.$result['id'],array("class"=>"form-horizontal")); ?>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label"><span class="text-danger">*</span>Client</label>
                    <select class="form-control" name="client_id">
                        <option value="">Select Client</option>
                        <?php foreach($clients as $c){ 
                            $selected= ($c['id'] ==$result['client_id']) ? 'selected=selected':'';
                            echo'<option value="'.$c['id'].'" '.$selected.'>'.$c['name'].'</option>';
                         } ?>
                    </select>
                    <span class="text-danger"><?php echo form_error('client_id');?></span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                <label class="control-label"><span class="text-danger">*</span>Invoice Date</label>
                <input type="date" name="invoice_date" value="<?=($this->input->post('invoice_date') ? $this->input->post('invoice_date') : $result['invoice_date']); ?>" class="form-control"/>
                <span class="text-danger"><?php echo form_error('invoice_date');?></span>
              </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                <label class="control-label"><span class="text-danger">*</span>Invoice Due Date</label>
                <input type="date" name="due_date" value="<?=($this->input->post('due_date') ? $this->input->post('due_date') : $result['due_date']); ?>" class="form-control"/>
                <span class="text-danger"><?php echo form_error('due_date');?></span>
              </div>
            </div>
        </div>
        <div class="row" id="more">
            <div class="col-md-3">
                <div class="form-group">
                <label class=" control-label">Service</label>
                <?php $service= explode(',', $result['service']);
                foreach($service as $v){ ?>
                <select class="form-control" name="service[]" style="margin-bottom: 20px;">
                    <option value="">Select Service</option>
                    <?php $selected=''; foreach($services as $s){
                            if($s['id'] ==$v){ 
                                $selected= 'selected';
                            }
                        }
                        echo'<option value="'.$s['id'].'" '.$selected.'>'.$s['service_title'].'</option>';
                      ?>
                </select>
                <?php }?>
              </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                <label class=" control-label">Rate</label>
                <?php $rate= explode(',', $result['rate']);
                foreach($rate as $r){  ?>
                <input type="text" name="rate[]" value="<?=$r?>" class="form-control" id="rate" style="margin-bottom: 20px;"/>
                <?php }?>
              </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                <label class=" control-label">Amount</label>
                <?php $amount= explode(',', $result['paid_amount']);
                foreach($amount as $a){  ?>
                <input type="text" name="paid_amount[]" value="<?=$a?>" class="form-control" id="paid_amount" style="margin-bottom: 20px;"/>
                <?php }?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class=" control-label">Description</label>
                <?php $desc= explode(',', $result['description']);
                foreach($desc as $d){  ?>
                <input type="text" class="form-control" name="description[]" value="<?=$d?>" style="margin-bottom: 20px;"/>
                <?php }?>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-success btn-sm addmore"><i class="fa fa-plus"></i> Add More</button>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                  <label class=" control-label">Note</label>
                  <textarea class="form-control" name="note" id="note" placeholder="Note..." rows="2" style="resize: none;"><?=$result['note']?></textarea>
                </div>
             </div>
        </div>
        <div class="row" id="tax">
            <?php   $taxname= explode(',', $result['tax_name']);
                    $tax= explode(',', $result['tax']);
                foreach($taxname as $key => $tname){
                    foreach($tax as $key1 => $t){
                    if ($key1==$key) {?>
            <div class="col-md-2">
                <div class="form-group">
                    <label class=" control-label">Tax Name</label>
                    <input type="text" name="tax_name[]" value="<?=$tname?>" class="form-control"/>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label class=" control-label">Tax Value</label>
                    <input type="text" name="tax[]" value="<?=$t?>" class="form-control"/>
                </div>
            </div>
            <?php }}}?>   
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
            $('#more').append('<div class="col-md-3"><div class="form-group"><select class="form-control service'+count+'" name="service[]" required><option value="">Select Service</option>'+
                        '<?php foreach($services as $s){ 
                            $selected= ($s['id'] ==$this->input->post('service')) ? 'selected=selected':'';
                            echo'<option value="'.$s['id'].'" data-key="'.$s['service_rate'].'" '.$selected.'>'.$s['service_title'].'</option>';
                         } ?>'+
                    '</select></div></div>'+
            '<div class="col-md-3"><div class="form-group"><input type="text" name="rate[]" class="form-control rate'+count+'" placeholder="Rate"/></div></div>'+
            '<div class="col-md-3"><div class="form-group"><input type="text" name="paid_amount[]" class="form-control" placeholder="Amount"/></div></div>'+
            '<div class="col-md-3"><div class="form-group"><input type="text" class="form-control" name="description[]" placeholder="Description"></div></div>');
            $('.service'+count).change(function(){
                let service_rate = $('option:selected', this).attr('data-key');
                $('.rate'+count).val(service_rate);
                console.log('service rate: ',service_rate);

            });
        });
        $('.addtax').click(function(){
            $('#tax').append('<div class="col-md-2"><div class="form-group"><label class=" control-label">Tax Name</label><input type="text" name="tax_name[]" class="form-control" placeholder="Tax Name"/></div></div>'+
                '<div class="col-md-2"><div class="form-group"><label class=" control-label">Tax Value</label><input type="text" name="tax[]" class="form-control" placeholder="Tax"/></div></div>');
        });
        $('.service'+count).change(function(){
            let service_rate = $('option:selected', this).attr('data-key');
            $('.rate'+count).val(service_rate);
            console.log('service rate: ',service_rate);

        });
    })
</script>
