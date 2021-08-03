<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>



    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
     <div class="card-header" style="background-color: transparent">
<div class="row">
    <div class="col-md-12">
        <h2>Add items</h2>
    </div>
</div>
</div>
<div class="card-body" style="margin: 5px; background-color: transparent">
<?php echo form_open('services/add'); ?>
<div class="row">
    <div class="col-md-4">
        <label for="contact_email" class=" control-label"><span class="text-danger">*</span>Contact email</label>
        <input type="email" name="contact_email" value="<?php echo $this->input->post('contact_email'); ?>" class="form-control" id="contact_email" required />
        <span class="text-danger"><?php echo form_error('contact_email');?></span>
    </div>
       <div class="col-md-4">
        <label for="pr_number" class=" control-label"><span class="text-danger">*</span>PR number</label>
        <input type="text"  name="pr_number" value="<?php echo $this->input->post('pr_number'); ?>" class="form-control" id="pr_number"  />
        <span class="text-danger"><?php echo form_error('pr_number');?></span>
    </div>
     <div class="col-md-4">
                    <label class="control-label">PR status</label>
                    <div class="form-group">
                        <select class="form-control"  name="pr_status" >
                            <option value="">- - - Select - - - </option>
                            <option value="Ordered">Ordered</option>
                            <option value="Shipped">Shipped</option>
                            <option value="Arrived">Arrived</option>
                            <option value="Others">Others</option>
                                  
                        </select>
                    </div>
                </div>
    <div class="col-md-4">
        <label for="delivery_date" class=" control-label"><span class="text-danger">*</span>Required delivery date</label>
        <input type="Date" name="delivery_date" value="<?php echo $this->input->post('delivery_date'); ?>" class="form-control" id="delivery_date" required />
        <span class="text-danger"><?php echo form_error('delivery_date');?></span>
    </div>
    <div class="col-md-4">
                    <label class="control-label">Tagging required</label>
                    <div class="form-group">
                        <select class="form-control"  name="tagging_req" >
                            <option value="">- - - Select - - - </option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
                    </div>
                </div>
                  <div class="col-md-4">
                    <label class="control-label">Approval required</label>
                    <div class="form-group">
                        <select class="form-control"  name="approval_req" >
                            <option value="">- - - Select - - - </option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
                    </div>
                </div>
                  <div class="col-md-4">
                    <label class="control-label">Associated Systems</label>
                    <div class="form-group">
                        <select class="form-control"  name="associated_systems" >
                            <option value="">- - - Select - - - </option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                             <option value="3">3</option>
                            <option value="4">4</option>
                             <option value="5">5</option>
                            <option value="6">6</option>
                          </select>
                    </div>
                </div>
    <div class="col-md-4">
        <label for="no_of_items" class=" control-label"><span class="text-danger">*</span>Number of items</label>
        <input type="number" name="no_of_items" value="<?php echo $this->input->post('no_of_items'); ?>" class="form-control" id="no_of_items" required />
        <span class="text-danger"><?php echo form_error('no_of_items');?></span>
    </div></div>

<div class="row">
    <div class="col-md-12" style="margin-bottom:20px; margin-top: 10px">
        <h2>Item details</h2>
    </div>
</div>

<div class="row">
                  <div class="col-md-4">
        <label class="control-label"><span class="text-danger">*</span>Part number</label>
        <input type="text" name="part_no[]"  class="form-control" id="part_no" placeholder="Enter part number" autocomplete="off" required/>
        <span class="text-danger"><?php echo form_error('part_no');?></span>
         </div>
         <!--  <div class="col-md-3"><label class="control-label">Item Description</label><div class="form-group"><select onmouseenter="abc()" class="js-example-basic-single form-control"  name="description[]" value="<?php echo $this->input->post('description'); ?>">
              <option value="">Select Description</option>
              <?php foreach ($description as $u) {$selected = ($u['id'] == $this->input->post('description')) ? ' selected="selected"' : "";?> <option value="<?=$u['id']?>"><?=$u['description']?></option>
              <?php }?></select>
             </div>
         </div> -->
            <div class="col-md-4">
        <label class="control-label">Item description</label>
        <input type="text" name="description[]"  class="form-control" id="description" placeholder="Enter item description" autocomplete="off"/>
        <span class="text-danger"><?php echo form_error('description');?></span>
         </div>
            <div class="col-md-4">
        <label class="control-label">Quantity</label>
        <input type="number" name="quantity[]"  class="form-control" id="quantity" placeholder="Enter quantity" autocomplete="off"/>
        <span class="text-danger"><?php echo form_error('quantity');?></span>
         </div>
             <div class="col-md-4" style="margin-top: 15px">
        <label class="control-label"><span class="text-danger">*</span>Price per unit</label>
        <input type="number" name="ppu[]" class="form-control" id="ppu" placeholder="Enter price per unit" autocomplete="off"/>
        <span class="text-danger"><?php echo form_error('ppu');?></span>
         </div>
           <div class="col-md-4" style="margin-top: 15px">
        <label class="control-label">Location, if arrived</label>
        <input type="text" name="location[]"  class="form-control" id="location" placeholder="Enter location" autocomplete="off"/>
        <span class="text-danger"><?php echo form_error('location');?></span>
         </div>
         </div>
         </div> 
         </div>
         </div>

<div class="row">
    <div class="col-md-12" style="width: 10%; margin-left: 20px; margin-top: 0.3%"></div>
	<button id="addRow" type="button" class="btn btn-info" style="width: 10%; margin-left: 20px; margin-top: 0.3%">Add additional items</button> 
    </div> 
</div>

    
   
<div class="row">
    <div class="col-md-12" style="width: 10%; margin-left: 13px">
        <button type="submit" class="btn btn-success" style="width: 10%; margin-left: 13px;">Save</button>
    </div>
</div>
<?php echo form_close(); ?>
<script type="text/javascript">
    $(document).ready(function() {
 $('.js-example-basic-single').select2();      
    });
</script>
  <script type="text/javascript">
        // add row
        $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<div class="col-md-3"><label class="control-label">Part Number</label><input type="text" name="part_no[]" class="form-control m-input" placeholder="Enter Part Number" autocomplete="off"></div>';
             html += '<div class="col-md-3"><label class="control-label">Item Description</label><input type="text" name="description[]" class="form-control m-input" placeholder="Enter Item Description" ></div>';
               html += '<div class="col-md-3"><label class="control-label">Quantity</label><input type="text" name="quantity[]" class="form-control m-input" placeholder="Enter Quantity" autocomplete="off"></div>';
                 html += '<div class="col-md-3"><label class="control-label">Price per Unit</label><input type="text" name="ppu[]" class="form-control m-input" placeholder="Enter Price per Unit" autocomplete="off"></div>';
                   html += '<div class="col-md-3"><label class="control-label">Location, if arrived</label><input type="text" name="location[]" class="form-control m-input" placeholder="Enter Location, if arrived" autocomplete="off"></div>';

            html += '<div class="col-md-6" style="margin-top:24px">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
    </script>
</body>
</html>


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
