<div class="card">
	<div class="card-header">
		<h3>Items</h3>
	<div class="pull-right">
	<a href="<?php echo site_url('items/add'); ?>" class="btn btn-success">Add</a> <br>
</div>
	</div>
	<div class="card-body" style="overflow-y: scroll;">
	 		<table id="myTable" class="table table-striped table-bordered">
				<thead>
				<tr>
					<th>ID</th>
					<th>Description</th>
					<th style="width: 15%">Actions</th>
				</tr>
				</thead>
			    <tbody>
				<?php foreach($items as $r){ ?>
					<tr>
						<td><?php echo $r['id']; ?></td>
						
						<td><?php echo $r['description']; ?></td>
						
						<td>
						
							<a href="<?php echo site_url('items/edit/'.$r['id']); ?>" class="btn btn-info btn-sm">Edit</a>
							<a href="<?php echo site_url('items/remove/'.$r['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		  	
	</div>
</div>
		

		