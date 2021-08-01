<div class="pull-right">
	<a href="<?php echo site_url('results/add'); ?>" class="btn btn-success">Add Result</a> <br>
</div>
<h1>All Results</h1>

<table id="myTable" class="table table-striped table-bordered">
	<thead>
	<tr>
		<th>Sr. No</th>
		<th>Bar Code Number</th>
		<th>Patient Name</th>
		<th>Date Swab Taken</th>
		<th>Result</th>
		<th>Date Created</th>
		<th>Authorised by</th>
		
		<th style="width: 25%">Actions</th>
	</tr>
	</thead>
    <tbody>
	<?php $count=0; foreach($results as $u){ $count++; ?>
		<tr>
			<td><?php echo $count; ?></td>
			<td><?php echo $u['bar_code_no']; ?></td>
			<td><?php echo $u['patient_name']; ?></td>
			
			<td><?php echo $u['date_swab_taken_patient']; ?></td>
			<td><?php echo $u['result']; ?></td>
			<td><?php echo $u['date_created']; ?></td>
			<td><?php echo $u['created_by']; ?></td>
			
			<td>
				<a href="<?php echo site_url('results/results/'.$u['id']); ?>" class="btn btn-primary btn-xs">Results</a>
				<a href="<?php echo site_url('results/edit/'.$u['id']); ?>" class="btn btn-info btn-xs">Edit</a>
				<a href="<?php echo site_url('results/remove/'.$u['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
				
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
