<div class="card">
    <div class="card-header">
        <h3>Items Add</h3>
    </div>
    <div class="card-body">
        <?php echo form_open('items/add'); ?>
        <div class="row">
            <div class="col-md-12">
                <label class=" control-label">Item Description</label>
                <div class="form-group">
                    <input type="text" name="description" value="<?php echo $this->input->post('description'); ?>" class="form-control" />
                    <span class="text-danger"><?php echo form_error('description');?></span>
                </div>
            </div>
          
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row" style="width: 100%">
                    <button type="submit" class="btn btn-success" style="width: 100%">Save</button>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>  

<script type="text/javascript">
    let count=0;
    $(function() {
        $('#moremonth').click(function(){
            $('#month').append('<div class="form-group"><select class="form-control select2" name="month[]">'+
                '<option>Select</option>'+
                                '<?php $months = array(
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
                                    echo'<option value="'.$v.'">'.$key.'</option>';
                                }?>'+
                '</select></div>');
            $('#tax').append('<div class="form-group"><input type="text" name="tax_amount[]" class="form-control" placeholder="Tax"/></div>');
            // $('.select2').select2();
        });
        $('#morefeild').click(function(){
            count++;
            console.log('click');
            $('#addmore').append('<div class="col-md-3"><div class="form-group"><label class="control-label">Feild'+count+'</label><input type="text" name="feild[]" class="form-control"/></div></div>');
        });

        $('.select2').select2();
    });
   

</script>
