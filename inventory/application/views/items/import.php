<div class="row">
    <div class="col-md-12 col-sm-12">
		<div class="card">
            <div class="card-header">
                <h3><i class="fa fa-upload"></i> Import Sales Tax Client</h3>
                <div class="clearfix"></div>
            </div>
			<div class="card-body">
				<?php echo form_open_multipart('import-sales'); ?>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-4">
						<div class="form-group">
							<input name="file" type="file" class="custom-file-input" id="file">
							<label class="custom-file-label custom-file-label-primary" id="file_lab" for="file" style="margin-left: 0px;width: 420px;">Select Sales Tax ExcelSheet</label>
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
						<a href="<?=base_url('download/salestax')?>" class="btn btn-info"><i class="fa fa-download"></i> Excel Demo Download</a>
						<h4 hidden>Demo Import ExcelSheet For Sales Tax Client</h4>
						<table hidden class="table table-striped table-bordered" style="width:100%">
							<thead style="background: gray">
							<tr>
								<th style="color: #fff">Status</th>
								<th style="color: #fff">Sr</th>
								<th style="color: #fff">Business Name</th>
								<th style="color: #fff">User-ID</th>
								<th style="color: #fff">Password</th>
								<th style="color: #fff">Pin Code</th>
								<th style="color: #fff">March</th>
								<th style="color: #fff">April</th>
								<th style="color: #fff">May</th>
								<th style="color: #fff">June</th>
								<th style="color: #fff">July</th>
								<th style="color: #fff">Aug</th>
								<th style="color: #fff">Sep</th>
								<th style="color: #fff">Oct</th>
								<th style="color: #fff">Nov</th>
								<th style="color: #fff">Dec</th>
								<th style="color: #fff">Jan</th>
								<th style="color: #fff">Feb</th>
							</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>