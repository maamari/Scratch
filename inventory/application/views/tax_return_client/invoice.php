<div class="card">
	<div class="card-header">
		<h3>Invoices</h3>
	</div>
	<div class="card-body" style="overflow-y: scroll;">
	 		<table id="example" class="table table-striped table-bordered">
				<thead>
				<tr>
					<th>ID</th>
					<th>Business Name</th>
					<th>S.No</th>
					<th>Invoice Title</th>
					<th>Amount</th>
					<th>Due Date</th>
					<th>Created by</th>
					<!-- <th style="width: 12%">Actions</th> -->
				</tr>
				</thead>
			    <tbody>
				<?php foreach($results as $r){ ?>
					<tr>
						<td><?php echo $r['id']; ?></td>
						<td><?php echo $r['business_name']; ?></td>
						<td><?php echo $r['sno']; ?></td>
						<td><?php echo $r['invoice_title']; ?></td>
						<td><?php echo $r['paid_amount']; ?></td>
						<td><?php echo $r['due_date']; ?></td>
						<td><?php echo $r['first_name'].' '.$r['last_name']; ?></td>
						<!-- <td>
							<a href="<?php echo site_url('edit-sales/'.$r['id']); ?>" class="btn btn-info btn-sm">Edit</a>
							<a href="<?php echo site_url('remove-sales/'.$r['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
						</td> -->
					</tr>
				<?php } ?>
				</tbody>
			</table>
		  	
	</div>
</div>
		

		