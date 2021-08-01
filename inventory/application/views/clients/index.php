<div class="card">
	<div class="card-header">
		<h3 class="card-title">Clients</h3>
		<div class="pull-right">
			<a href="<?php echo site_url('import-client'); ?>" class="btn btn-info"><i class="fa fa-upload"></i> Import</a>
			<a href="<?php echo site_url('add-client'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
		</div>
	</div>
	<div class="card-body">
		<table id="example" class="table table-striped table-bordered">
			<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Number</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Address</th>
				<th style="width: 12%">Actions</th>
			</tr>
			</thead>
		    <tbody>
			<?php foreach($clients as $u){ ?>
				<tr>
					<td><?php echo $u['id']; ?></td>
					<td><?php echo $u['name']; ?></td>
					<td><?php echo $u['number']; ?></td>
					<td><?php echo $u['email']; ?></td>
					<td><?php echo $u['mobile']; ?></td>
					<td><?php echo $u['address']; ?></td>
						<td><a href="<?php echo site_url('edit-client/'.$u['id']); ?>" class="btn btn-info btn-sm">Edit</a>
						<a href="<?php echo site_url('remove-client/'.$u['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>	
		

		
