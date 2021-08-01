<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
    //<![CDATA[
    bkLib.onDomLoaded(function() {
        nicEditors.allTextAreas()
    });
    //]]>
</script>
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
        <?php echo form_open_multipart('update-settings'); ?>
      	<div class="card" style="overflow:">
            <div class="card-header text-right" style="padding-bottom: 0">
                <button type="submit" class="btn btn-out-dashed btn-success btn-square">
                    <i class="fa fa-check"></i> Update
                </button>
            </div>
			<div class="card-block">
                <fieldset class="scheduler-border" id="commidity">
                    <legend class="scheduler-border">Home Page Settings</legend>
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
                            <label class="control-label">Level 1 (%)</label>
                            <div class="form-group">
                                <input type="number" name="level1" class="form-control" value="<?=$this->data['setting']['level1']?>" style="display: block;">
                            </div>
                            <label class="control-label">Level 2 (%)</label>
                            <div class="form-group">
                                <input type="number" name="level2" class="form-control" value="<?=$this->data['setting']['level2']?>" style="display: block;">
                            </div>
                        </div>
    					<div class="col-md-3">
    						<label for="logo" class="control-label">Logo</label>
                        	<div class="form-group">
                                <input type="file" name="logo" class="form-control" style="display: block;">
                                <img src="<?=base_url('uploads/'.$this->data['setting']['logo'])?>" style="height: 80px; width: 100%">
                        	</div>
    					</div>
    					<div class="col-md-3">
    						<label for="fabicon" class="control-label">Febicon</label>
                        	<div class="form-group">
                                <input type="file" name="fabicon" class="form-control" style="display: block;">
                                <center><img src="<?=base_url('uploads/'.$this->data['setting']['favicon'])?>" style=" width: auto;"></center>
                        	</div>
    					</div>
                        <div class="col-md-3">
                            <label class="control-label">Header Banner</label>
                            <div class="form-group">
                                <input type="file" name="header" class="form-control" style="display: block;">
                                <img src="<?=base_url('uploads/'.$this->data['setting']['header'])?>" style="height: 80px; width: 100%">
                            </div>
                        </div>
                        
                        
                        <div class="col-md-12">
                            <label for="address" class="control-label">About Us</label>
                            <div class="form-group">
                                <textarea name="about_us" placeholder="Description..." rows="6" class="form-control" id="about_us" style="resize: none;"><?=$this->data['setting']['about_us']?></textarea>
                            </div>
                        </div>
    				</div>
                </fieldset>
                <!-- Support -->
                <fieldset class="scheduler-border" id="commidity">
                    <legend class="scheduler-border">Support Page Settings</legend>
                    <div class="row clearfix">
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
                        <div class="col-md-6">
                            <label for="address" class="control-label">Address</label>
                            <div class="form-group">
                                <textarea name="address" placeholder="Address..." rows="6" class="form-control" id="address" style="resize: none;"><?=$this->data['setting']['address']?></textarea>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Term Of Policy -->
                <fieldset class="scheduler-border" id="commidity">
                    <legend class="scheduler-border">Term Of Policy</legend>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label class="control-label">Term Of Policy</label>
                            <div class="form-group">
                                <textarea name="policy" placeholder="Term Of Policy..." rows="6" class="form-control" id="policy" style="resize: none;"><?=$this->data['setting']['policy']?></textarea>
                            </div>
                        </div>
                    </div>
                </fieldset>
			</div>
			<div class="box-footer text-right" style="padding: 0 20px 10px 0">
            	<button type="submit" class="btn btn-out-dashed btn-success btn-square">
					<i class="fa fa-check"></i> Update
				</button>
	        </div>				
			
		</div>
        <?php echo form_close(); ?>
    </div>
</div>