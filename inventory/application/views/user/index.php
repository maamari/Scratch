<div class="pull-right">
	<a href="<?php echo site_url('user/add'); ?>" class="btn btn-success">Add</a> <br>
</div>

<table id="myTable" class="table table-striped table-bordered">
	<thead>
	<tr>
		<th>ID</th>
		<th>Role</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Status</th>
		<th style="width: 11%">Actions</th>
	</tr>
	</thead>
    <tbody>
	<?php foreach($users as $u){ ?>
		<tr>
			<td><?php echo $u['id']; ?></td>
			<td><?php if($u['role'] == ADMIN){
					echo 'Admin';
				}elseif($u['role'] == MANAGER){
					echo 'Manager';
				} ?></td>
			<td><?php echo $u['first_name']; ?></td>
			<td><?php echo $u['last_name']; ?></td>
			<td><?php echo $u['email']; ?></td>
			<td><?php
				if($u['status'] == ACTIVE){
					echo 'Active';
				}elseif($u['status'] == INACTIVE){
					echo 'In-Active';
				} ?></td>
			<td>
				<a href="<?php echo site_url('user/edit/'.$u['id']); ?>" class="btn btn-info btn-xs">Edit</a>
				<a href="<?php echo site_url('user/remove/'.$u['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
