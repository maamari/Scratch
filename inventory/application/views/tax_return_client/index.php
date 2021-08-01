<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
    .nav-pills > li.active > a{
      background-color: transparent !important;
    }
    .nav-tabs li{
    	width: auto;
    }
  </style>
<div class="card">
	<div class="card-header">
		<h3>Tex Return Client</h3>
		<div class="pull-right">
			<a href="<?php echo site_url('pdf/return_tax'); ?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a>
			<a href="<?php echo site_url('import-tax'); ?>" class="btn btn-info"><i class="fa fa-upload"></i> Import</a>
			<a href="<?php echo site_url('add-tax'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add</a> <br>
		</div>
	</div>
	<div class="card-body" style="overflow-y: scroll;">
		<ul class="nav nav-tabs">
		  <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
		  <li><a data-toggle="tab" href="#pending">Pending</a></li>
		  <li><a data-toggle="tab" href="#clear">Clear</a></li>
		  <li><a data-toggle="tab" href="#upcoming">Upcoming</a></li>
		</ul>
		<div class="tab-content">
		  	<div id="home" class="tab-pane fade in active show" style="padding-top: 20px;">
		    	<table id="myTable" class="table table-striped table-bordered">
					<thead>
					<tr>
						<th>ID</th>
						<th>Client Name</th>
						<th>Business Name</th>
						<th>Category</th>
						<th>File Location</th>
						<th>Contact No</th>
						<th>Pin Code</th>
						<th>Email</th>
						<th>Status</th>
						<th>Created by</th>
						<th style="width: 15%">Actions</th>
					</tr> 
					</thead>
				  <tbody> 
					<?php foreach($results as $u){ ?>
						<tr>
							<td><?php echo $u['id']; ?></td>
							<td><?php echo $u['client_name']; ?></td>
							<td><?php echo $u['business_name']; ?></td>
							<td><?php echo $u['category']; ?></td>
							<td><?php echo $u['file_loc']; ?></td>
							<td><?php echo $u['contact']; ?></td>
							<td><?php echo $u['pin_code']; ?></td>
							<td><?php echo $u['email']; ?></td>
							<td><?php echo $u['status']; ?></td>
							<td><?php echo $u['first_name'].' '.$u['last_name']; ?></td>
							<td>
								<a href="<?php echo site_url('view-tax/'.$u['id']); ?>" class="btn btn-success btn-sm">View</a>
								<a href="<?php echo site_url('edit-tax/'.$u['id']); ?>" class="btn btn-info btn-sm">Edit</a>
								<a href="<?php echo site_url('remove-tax/'.$u['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
		  	</div>
		  	<div id="pending" class="tab-pane fade" style="padding-top: 20px;">
		    	<table id="example2" class="table table-striped table-bordered">
					<thead>
					<tr>
						<th>ID</th>
						<th>Client Name</th>
						<th>Business Name</th>
						<th>Category</th>
						<th>File Location</th>
						<th>Contact No</th>
						<th>Pin Code</th>
						<th>Email</th>
						<th>Status</th>
						<th style="width: 12%">Actions</th>
					</tr>
					</thead>
				    <tbody>
					<?php foreach($results as $u){
						if ($u['status'] == 'pending') {?>
						<tr>
							<td><?php echo $u['id']; ?></td>
							<td><?php echo $u['client_name']; ?></td>
							<td><?php echo $u['business_name']; ?></td>
							<td><?php echo $u['category']; ?></td>
							<td><?php echo $u['file_loc']; ?></td>
							<td><?php echo $u['contact']; ?></td>
							<td><?php echo $u['pin_code']; ?></td>
							<td><?php echo $u['email']; ?></td>
							<td><?php echo $u['status']; ?></td>
							<td>
								<a href="<?php echo site_url('tax_return_client/edit/'.$u['id']); ?>" class="btn btn-info btn-sm">Edit</a>
								<a href="<?php echo site_url('tax_return_client/remove/'.$u['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
							</td>
						</tr>
					<?php }}?>
					</tbody>
				</table>
		  	</div>
		  	<div id="clear" class="tab-pane fade" style="padding-top: 20px;">
		    	<table id="example3" class="table table-striped table-bordered">
					<thead>
					<tr>
						<th>ID</th>
						<th>Client Name</th>
						<th>Business Name</th>
						<th>Category</th>
						<th>File Location</th>
						<th>Contact No</th>
						<th>Pin Code</th>
						<th>Email</th>
						<th>Status</th>
						<th style="width: 12%">Actions</th>
					</tr>
					</thead>
				    <tbody>
					<?php foreach($results as $u){
						if ($u['status'] == 'clear') {?>
						<tr>
							<td><?php echo $u['id']; ?></td>
							<td><?php echo $u['client_name']; ?></td>
							<td><?php echo $u['business_name']; ?></td>
							<td><?php echo $u['category']; ?></td>
							<td><?php echo $u['file_loc']; ?></td>
							<td><?php echo $u['contact']; ?></td>
							<td><?php echo $u['pin_code']; ?></td>
							<td><?php echo $u['email']; ?></td>
							<td><?php echo $u['status']; ?></td>
							<td>
								<a href="<?php echo site_url('tax_return_client/edit/'.$u['id']); ?>" class="btn btn-info btn-sm">Edit</a>
								<a href="<?php echo site_url('tax_return_client/remove/'.$u['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
							</td>
						</tr>
					<?php } }?>
					</tbody>
				</table>
		  	</div>
			<div id="upcoming" class="tab-pane fade" style="padding-top: 20px;">
			    <table id="example4" class="table table-striped table-bordered">
					<thead>
					<tr>
						<th>ID</th>
						<th>Client Name</th>
						<th>Business Name</th>
						<th>Category</th>
						<th>File Location</th>
						<th>Contact No</th>
						<th>Pin Code</th>
						<th>Email</th>
						<th>Status</th>
						<th style="width: 12%">Actions</th>
					</tr>
					</thead>
				    <tbody>
					<?php foreach($results as $u){ 
						if ($u['status'] == 'upcoming') {?>
						<tr>
							<td><?php echo $u['id']; ?></td>
							<td><?php echo $u['client_name']; ?></td>
							<td><?php echo $u['business_name']; ?></td>
							<td><?php echo $u['category']; ?></td>
							<td><?php echo $u['file_loc']; ?></td>
							<td><?php echo $u['contact']; ?></td>
							<td><?php echo $u['pin_code']; ?></td>
							<td><?php echo $u['email']; ?></td>
							<td><?php echo $u['status']; ?></td>
							<td>
								<a href="<?php echo site_url('tax_return_client/edit/'.$u['id']); ?>" class="btn btn-info btn-sm">Edit</a>
								<a href="<?php echo site_url('tax_return_client/remove/'.$u['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
							</td>
						</tr>
					<?php }}?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	function get_tax(id) {
		$('.modal-body').append('<input hidden name="id" value="'+id+'">');
		 // $.ajax({
   //      url: "<?=base_url('tax_return_client/get_invoice/')?>"+id,
   //       type: "GET",
   //      dataType: "json",
   //      success: function(res){
   //      	if (res) {
   //      	console.log(res);
   //      	res=res;
   //      	$('.modal-body').append('<input hidden name="invoice_id" value="'+res.id+'">');
   //      	$('#invoice_title').val(res.invoice_title);
   //      	$('#paid_amount').val(res.paid_amount);
   //      	$('#description').val(res.description);
   //      	}
                   
   //  }});
	}
</script>