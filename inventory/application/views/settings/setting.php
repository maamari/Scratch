<style type="text/css">
    .input-container {
        margin: 0 auto;
        max-width: 340px;
        background-color: #EDEDED;
        border: 1px solid #DFDFDF;
        border-radius: 5px;
    }

    input[type='file'] {
        display: none;
    }

    .file-info,.file-info1,.file-info2{
        font-size: 0.9em;
        color: #176c9d;
    }

    .browse-btn,.browse-btn1,.browse-btn2{
        background: #176c9d;
        color: #fff;
        min-height: 35px;
        padding: 10px;
        border: none;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .browse-btn:hover,.browse-btn1:hover,.browse-btn2:hover {
        background: #3c8dbc;
        cursor: pointer;
    }

    @media (max-width: 300px) {
        button {
            width: 100%;
            border-top-right-radius: 5px;
            border-bottom-left-radius: 0;
        }

        .file-info,.file-info1,.file-info2{
            display: block;
            margin: 7px 5px;
        }
    }
    fieldset.scheduler-border {
        border: 1px groove #DBDEE0 !important;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow:  0px 0px 0px 0px #000;
        box-shadow:  0px 0px 0px 0px #DBDEE0;
        /*box-shadow: 0 1rem 3rem #DBDEE0!important;*/
    }
    legend.scheduler-border {
        color: #3c8dbc;
        width:inherit; /* Or auto */
        padding:5px 10px;
        border: 1px solid #DBDEE0;
        box-shadow: 0 0 1rem #DBDEE0!important;
    }
</style>
<div class="row">
    <div class="col-md-12">
      	<div class="card" style="overflow:">
			<?php echo form_open_multipart('dashboard/setting'); ?>
			<div class="card-block">
                <fieldset class="scheduler-border" id="commidity">
                    <legend class="scheduler-border">Organisation Settings</legend>
    				<div class="row clearfix">
    					<div class="col-md-3">
    						<label for="website_name" class="control-label"><span class="text-danger">*</span>Website Name</label>
    						<div class="form-group">
    							<input type="text" name="website_name" value="<?=$this->data['setting']['website_name']?>" class="form-control" id="website_name">
    							<span class="text-danger"></span>
    						</div>
    					</div>
    					<div class="col-md-3">
    						<label for="website_name" class="control-label"><span class="text-danger">*</span>Short Name</label>
    						<div class="form-group">
    							<input type="text" name="short_name" value="<?=$this->data['setting']['short_name']?>" class="form-control" id="website_name">
    							<span class="text-danger"></span>
    						</div>
    					</div>
    					<div class="col-md-3">
    						<label for="phone" class="control-label">Phone (<i class="fa fa-phone"></i>)</label>
    						<div class="form-group">
    							<input type="text" name="phone" placeholder="+92 303 785 9398" maxlength="16" value="<?=$this->data['setting']['phone']?>" class="form-control" id="phone">
    						</div>
    					</div>
    					<div class="col-md-3">
    						<label for="email" class="control-label"><span class="text-danger">*</span>Email (<i class="fa fa-envelope"></i>)</label>
    						<div class="form-group">
    							<input type="text" name="email" value="<?=$this->data['setting']['email']?>" class="form-control" id="email">
    							<span class="text-danger"></span>
    						</div>
    					</div>
    					<div class="col-md-3">
    						<label class="control-label">Facebook (<i class="fa fa-facebook"></i>)</label>
    						<div class="form-group">
    							<input type="text" name="facebook" value="<?=$this->data['setting']['facebook']?>" class="form-control" id="facebook">
    							<span class="text-danger"></span>
    						</div>
    					</div>
    					<div class="col-md-3">
    						<label class="control-label">Twitter (<i class="fa fa-twitter"></i>)</label>
    						<div class="form-group">
    							<input type="text" name="twitter" value="<?=$this->data['setting']['twitter']?>" class="form-control" id="twitter">
    							<span class="text-danger"></span>
    						</div>
    					</div>
                        <div class="col-md-3">
                            <label class="control-label">Instagram ( <i class="fa fa-instagram"></i> )</label>
                            <div class="form-group">
                                <input type="text" name="instagram" value="<?=$this->data['setting']['instagram']?>" class="form-control" id="instagram">
                                <span class="text-danger"></span>
                            </div>
                        </div>
    					<div class="col-md-3">
    						<label class="control-label">Linkedin (<i class="fa fa-linkedin"></i>)</label>
    						<div class="form-group">
    							<input type="text" name="linkedin" value="<?=$this->data['setting']['linkedin']?>" class="form-control" id="linkedin">
    							<span class="text-danger"></span>
    						</div>
    					</div>
                        <div class="col-md-3">
                            <label class="control-label">Pinterest (<i class="fa fa-pinterest"></i>)</label>
                            <div class="form-group">
                                <input type="text" name="pinterest" value="<?=$this->data['setting']['pinterest']?>" class="form-control" id="pinterest">
                                <span class="text-danger"></span>
                            </div>
                        </div>
    					<div class="col-md-3">
                            <label class="control-label">Youtube (<i class="fa fa-youtube"></i>)</label>
                            <div class="form-group">
                                <input type="text" name="utube" value="<?=$this->data['setting']['utube']?>" class="form-control" id="utube">
                                <span class="text-danger"></span>
                            </div>
                        </div>
    					<div class="col-md-3">
    						<label for="logo" class="control-label">Logo</label>
                        	<div class="form-group">
                                <input type="file" name="logo" class="form-control" style="display: block;">
                            	<!-- <div class="input-container">
                                	<input type="file" name="logo" class="form-control" id="real-input">
                                	<button type="button" class="browse-btn">Browse Files</button>
                                	<span class="file-info">Upload Logo</span>
                            	</div> -->
                                <img src="<?=base_url('uploads/'.$this->data['setting']['logo'])?>" style="height: 80px; width: 100%">
                        	</div>
    					</div>
    					<div class="col-md-3">
    						<label for="fabicon" class="control-label">Febicon</label>
                        	<div class="form-group">
                                <input type="file" name="fabicon" class="form-control" style="display: block;">
                            	<!-- <div class="input-container">
                                	<input type="file" name="fabicon" class="form-control" id="real-input1">
                                	<button type="button" class="browse-btn1">Browse Files</button>
                                	<span class="file-info1">Upload Febicon</span>
                            	</div> -->
                                <center><img src="<?=base_url('uploads/'.$this->data['setting']['favicon'])?>" style=" width: auto;"></center>
                        	</div>
    					</div>
                        <div class="col-md-3" hidden>
                            <label class="control-label">Header bg Image</label>
                            <div class="form-group">
                                <input type="file" name="header" class="form-control" style="display: block;">
                                <img src="<?=base_url('uploads/'.$this->data['setting']['header'])?>" style="height: 80px; width: 100%">
                            </div>
                        </div>
                        <div class="col-md-3" hidden>
                            <label class="control-label">Industry bg Image</label>
                            <div class="form-group">
                                <input type="file" name="industry" class="form-control" style="display: block;">
                                <img src="<?=base_url('uploads/'.$this->data['setting']['industry'])?>" style="height: 80px; width: 100%">
                            </div>
                        </div>
                        <div class="col-md-3" hidden>
                            <label class="control-label">Pricing bg Image</label>
                            <div class="form-group">
                                <input type="file" name="pricing" class="form-control" style="display: block;">
                                <img src="<?=base_url('uploads/'.$this->data['setting']['pricing'])?>" style="height: 80px; width: 100%">
                            </div>
                        </div>
                        <div class="col-md-3" hidden>
                            <label class="control-label">Blog bg Image</label>
                            <div class="form-group">
                                <input type="file" name="blog" class="form-control" style="display: block;">
                                <img src="<?=base_url('uploads/'.$this->data['setting']['blog'])?>" style="height: 80px; width: 100%">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="control-label">Address</label>
                            <div class="form-group">
                                <textarea name="address" placeholder="Address..." rows="6" class="form-control" id="address" style="resize: none;"><?=$this->data['setting']['address']?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="control-label">keywords</label>
                            <div class="form-group">
                                <textarea name="keywords" placeholder="keywords..." rows="6" class="form-control" id="keywords" style="resize: none;"><?=$this->data['setting']['keywords']?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-out-dashed btn-success btn-square"><i class="fa fa-check"></i> Update</button>
                        </div>
    				</div>
                </fieldset>

			</div>
			<div class="box-footer">
            	<!-- <button type="submit" class="btn btn-out-dashed btn-success btn-square">
					<i class="fa fa-check"></i> Update
				</button> -->
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>
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

</script>