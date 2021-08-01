<div class="row">
    <div class="col-md-12 col-sm-12">
		<div class="card">
            <div class="card-header">
                <h3><i class="fa fa-upload"></i> Import Tax Return</h3>
                <div class="clearfix"></div>
            </div>
			<div class="card-body">
				<?php echo form_open_multipart('import-tax'); ?>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-4">
						<div class="form-group">
							<input name="file" type="file" class="custom-file-input" id="file">
							<label class="custom-file-label custom-file-label-primary" id="file_lab" for="file" style="margin-left: 0px;width: 420px;">Select Tax return ExcelSheet</label>
						</div>
					</div>
					<div class="col-md-2">
						<button type="submit" name="import" class="hvr-grow btn btn-success" style="padding: 0.260rem .75rem"><li class="fa fa-upload"></li> Upload</button>
					</div>
					<div class="col-md-3"></div>
				</div>
				<?php echo form_close(); ?>
				
				<div class="row">
					<div class="col-md-12">
						<h4>Demo Import ExcelSheet For Tax Return Client</h4>
						<table class="table table-striped table-bordered" style="width:100%">
							<thead style="background: gray">
							<tr>
								<th style="color: #fff">Category</th>
								<th style="color: #fff">NTN</th>
								<th style="color: #fff">STRN/ Reference</th>
								<th style="color: #fff">Contact No</th>
								<th style="color: #fff">User ID/ Reg No</th>
								<th style="color: #fff">Password</th>
								<th style="color: #fff">Pin Code</th>
								<th style="color: #fff">Email</th>
								<th style="color: #fff">Email Password</th>
								<th style="color: #fff">Business Name</th>
								<th style="color: #fff">Date of Birth</th>
								<th style="color: #fff">Address</th>
							</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>