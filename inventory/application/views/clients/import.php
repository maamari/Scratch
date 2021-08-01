<div class="row">
    <div class="col-md-12 col-sm-12">
		<div class="card">
            <div class="card-header">
                <h3><i class="fa fa-upload"></i> Import Client</h3>
                <div class="clearfix"></div>
            </div>
			<div class="card-body">
				<?php echo form_open_multipart('import-client'); ?>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-4">
						<div class="form-group">
							<input name="file" type="file" class="custom-file-input" id="file">
							<label class="custom-file-label custom-file-label-primary" id="file_lab" for="file" style="margin-left: 0px;width: 420px;">Select Client ExcelSheet</label>
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
						<a href="<?=base_url('download/client')?>" class="btn btn-info"><i class="fa fa-download"></i> Excel Demo Download</a>
						<h4 hidden>Demo Import ExcelSheet For Client</h4>
						<table hidden class="table table-striped table-bordered" style="width:100%">
							<thead style="background: gray">
							<tr>
								<th style="color: #fff">Name</th>
								<th style="color: #fff">Number</th>
								<th style="color: #fff">Email</th>
								<th style="color: #fff">Mobile Number</th>
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