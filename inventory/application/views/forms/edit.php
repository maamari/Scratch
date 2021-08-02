<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<div class="row">
    <div class="col-md-12">
        <h2>Update Items Details</h2>
    </div>
</div>

<?php echo form_open('forms/edit/'.$forms['id'],array("class"=>"form-horizontal")); ?>
<div class="row">
       <div class="col-md-3">
        <label class="control-label">Part Number</label>
        <input type="text" name="part_no" value="<?php echo ($this->input->post('part_no') ? $this->input->post('part_no') : $forms['part_no']); ?>" class="form-control" id="part_no" placeholder="Enter Part number" />
        <span class="text-danger"><?php echo form_error('part_no');?></span>
         </div>

          <div class="col-md-3">
        <label class="control-label">Item Description</label>
        <input type="text" name="description" value="<?php echo ($this->input->post('description') ? $this->input->post('description') : $forms['description']); ?>" class="form-control" id="part_no" placeholder="Enter Item Description" />
        <span class="text-danger"><?php echo form_error('description');?></span>
         </div>

<!-- 
          <div class="col-md-3"><label class="control-label">Item Description</label><div class="form-group"><select onmouseenter="abc()" class="js-example-basic-single form-control"  name="description" >
              <option value="">Select Description</option>
              <?php foreach ($items as $u) { $selected = ($u['id'] == $forms['description']) ? ' selected="selected"' : "";?>
                        <option value="<?=$u['id']?>" <?=$selected?>><?=$u['description']?></option>
              <?php }?></select>
             </div>
         </div> -->
            <div class="col-md-3">
        <label class="control-label">Quantity</label>
        <input type="number" name="quantity" value="<?php echo ($this->input->post('quantity') ? $this->input->post('quantity') : $forms['quantity']); ?>" class="form-control" id="quantity" placeholder="Enter Quantity" />
        <span class="text-danger"><?php echo form_error('quantity');?></span>
         </div>
             <div class="col-md-3">
        <label class="control-label">Price per Unit</label>
        <input type="number" name="ppu" value="<?php echo ($this->input->post('ppu') ? $this->input->post('ppu') : $forms['ppu']); ?>" class="form-control" id="ppu" placeholder="Enter Price Per Unit" />
        <span class="text-danger"><?php echo form_error('ppu');?></span>
         </div>
           <div class="col-md-3">
        <label class="control-label">Location, if arrived</label>
        <input type="text" name="location" value="<?php echo ($this->input->post('location') ? $this->input->post('location') : $forms['location']); ?>" class="form-control" id="location" placeholder="Enter Location" />
        <span class="text-danger"><?php echo form_error('location');?></span>
         </div>
    
   
</div>
<br>
<div class="row">
    <div class="col-md-12">
      
            <button type="submit" class="btn btn-success" style="width: 100%">Update</button>
       
    </div>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
    $(document).ready(function() {
 $('.js-example-basic-single').select2();
      
    });
</script>

<script type="text/javascript">
    const uploadButton = document.querySelector('.browse-btn');
    const fileInfo = document.querySelector('.file-info');
    const realInput = document.getElementById('real-input');

    const uploadButton1 = document.querySelector('.browse-btn1');
    const fileInfo1 = document.querySelector('.file-info1');
    const realInput1 = document.getElementById('real-input1');

    const uploadButton2 = document.querySelector('.browse-btn2');
    const fileInfo2 = document.querySelector('.file-info2');
    const realInput2 = document.getElementById('real-input2');

    uploadButton.addEventListener('click', (e) => {
        realInput.click();
    });
    uploadButton1.addEventListener('click', (e) => {
        realInput1.click();
    });
    uploadButton2.addEventListener('click', (e) => {
        realInput2.click();
    });

    realInput.addEventListener('change', (e) => {
        const name = realInput.value.split(/\\|\//).pop();
    const truncated = name.length > 20
        ? name.substr(name.length - 20)
        : name;

    fileInfo.innerHTML = truncated;
    });
    realInput1.addEventListener('change', (e) => {
        const name = realInput1.value.split(/\\|\//).pop();
    const truncated = name.length > 20
        ? name.substr(name.length - 20)
        : name;

    fileInfo1.innerHTML = truncated;
    });
    realInput2.addEventListener('change', (e) => {
        const name = realInput2.value.split(/\\|\//).pop();
    const truncated = name.length > 20
        ? name.substr(name.length - 20)
        : name;

    fileInfo2.innerHTML = truncated;
    });
   function abc() {
      $('.js-example-basic-single').select2();
    }
</script>
