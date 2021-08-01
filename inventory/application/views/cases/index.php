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
		<h3>Cases</h3>
		<div class="pull-right">
			<a href="<?php echo site_url('import-cases'); ?>" class="btn btn-info"><i class="fa fa-upload"></i> Import</a>
			<a href="<?php echo site_url('add-case'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add</a> <br>
		</div>
	</div>
	<div class="card-body" style="overflow-y: scroll;">
		<?php echo form_open('cases'); ?>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>From Next Date</label>
					<input type="date" name="from_date" class="form-control">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>To Next Date</label>
					<input type="date" name="to_date" class="form-control">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group" style="padding-top: 25px">
					<button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Clear</button>
					<button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Search</button>
				</div>
			</div>
		</div>
		<?php echo form_close(); ?>
		<ul class="nav nav-tabs">
		  <li class="active"><a data-toggle="tab" href="#running">Running Cases</a></li>
		  <li><a data-toggle="tab" href="#important">Important Cases</a></li>
		  <li><a data-toggle="tab" href="#noboard">No Board Cases</a></li>
		  <li><a data-toggle="tab" href="#archived">Archived Cases</a></li>
		</ul>
		<div class="tab-content">
		  	<div id="running" class="tab-pane fade in active" style="padding-top: 20px;">
		    	<table id="example" class="table table-striped table-bordered">
						<thead>
						<tr>
							<th>No</th>
							<th>Client & Case Detail</th>
							<th>Court Detail</th>
							<th>Petitioner vs Respondent</th>
							<th>Next Date</th>
							<th>Status</th>
							<th style="width: 12%">Actions</th>
						</tr>
						</thead>
				    <tbody>
						<?php foreach($results as $r){ ?>
						<tr>
							<td><?=$r['id']; ?></td>
							<td><?='<a href="#">'.$u['court'].'</a><br> No.'.$r['case_no'].'<br> Case: '.$r['case_type'];
							echo '<br> Assign To.'.$r['case_no']; ?></td>
							<td><?='Court '.$r['court'].'<br> No.'.$r['court_num'].'<br> Magistrate: '.$r['judge_name'];?></td>
							<td><?php echo $r['court'].' <br> VS <br>'.$r['court']; ?></td>
							<td><?php echo $r['next_hiring_date']; ?></td>
							<td><?php echo $r['status']; ?></td>
							<td>
								<a href="<?php echo site_url('edit-case/'.$r['id']); ?>" class="btn btn-info btn-sm">Edit</a>
								<a href="<?php echo site_url('remove-case/'.$r['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
							</td>
						</tr>
						<?php } ?>
						</tbody>
					</table>
		  	</div>
		  	<div id="important" class="tab-pane fade" style="padding-top: 20px;">
		  		<table id="example2" class="table table-striped table-bordered">
						<thead>
						<tr>
							<th>No</th>
							<th>Client & Case Detail</th>
							<th>Court Detail</th>
							<th>Petitioner vs Respondent</th>
							<th>Next Date</th>
							<th>Status</th>
							<th style="width: 12%">Actions</th>
						</tr>
						</thead>
				    <tbody>
						<?php foreach($results as $r){ ?>
						<tr>
							<td><?=$r['id']; ?></td>
							<td><?='<a href="#">'.$u['court'].'</a><br> No.'.$r['case_no'].'<br> Case: '.$r['case_type'];
							echo '<br> Assign To.'.$r['case_no']; ?></td>
							<td><?='Court '.$r['court'].'<br> No.'.$r['court_num'].'<br> Magistrate: '.$r['judge_name'];?></td>
							<td><?php echo $r['court'].' <br> VS <br>'.$r['court']; ?></td>
							<td><?php echo $r['next_hiring_date']; ?></td>
							<td><?php echo $r['status']; ?></td>
							<td>
								<a href="<?php echo site_url('edit-case/'.$r['id']); ?>" class="btn btn-info btn-sm">Edit</a>
								<a href="<?php echo site_url('remove-case/'.$r['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
							</td>
						</tr>
						<?php } ?>
						</tbody>
					</table>
		  	</div>
		  	<div id="noboard" class="tab-pane fade" style="padding-top: 20px;">
		    	<table id="example3" class="table table-striped table-bordered">
						<thead>
						<tr>
							<th>No</th>
							<th>Client & Case Detail</th>
							<th>Court Detail</th>
							<th>Petitioner vs Respondent</th>
							<th>Next Date</th>
							<th>Status</th>
							<th style="width: 12%">Actions</th>
						</tr>
						</thead>
				    <tbody>
						<?php foreach($results as $r){ ?>
						<tr>
							<td><?=$r['id']; ?></td>
							<td><?='<a href="#">'.$u['court'].'</a><br> No.'.$r['case_no'].'<br> Case: '.$r['case_type'];
							echo '<br> Assign To.'.$r['case_no']; ?></td>
							<td><?='Court '.$r['court'].'<br> No.'.$r['court_num'].'<br> Magistrate: '.$r['judge_name'];?></td>
							<td><?php echo $r['court'].' <br> VS <br>'.$r['court']; ?></td>
							<td><?php echo $r['next_hiring_date']; ?></td>
							<td><?php echo $r['status']; ?></td>
							<td>
								<a href="<?php echo site_url('edit-case/'.$r['id']); ?>" class="btn btn-info btn-sm">Edit</a>
								<a href="<?php echo site_url('remove-case/'.$r['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
							</td>
						</tr>
						<?php } ?>
						</tbody>
					</table>
		  	</div>
				<div id="archived" class="tab-pane fade" style="padding-top: 20px;">
				    <table id="example4" class="table table-striped table-bordered">
						<thead>
						<tr>
							<th>No</th>
							<th>Client & Case Detail</th>
							<th>Court Detail</th>
							<th>Petitioner vs Respondent</th>
							<th>Next Date</th>
							<th>Status</th>
							<th style="width: 12%">Actions</th>
						</tr>
						</thead>
				    <tbody>
						<?php foreach($results as $r){ ?>
						<tr>
							<td><?=$r['id']; ?></td>
							<td><?='<a href="#">'.$u['court'].'</a><br> No.'.$r['case_no'].'<br> Case: '.$r['case_type'];
							echo '<br> Assign To.'.$r['case_no']; ?></td>
							<td><?='Court '.$r['court'].'<br> No.'.$r['court_num'].'<br> Magistrate: '.$r['judge_name'];?></td>
							<td><?php echo $r['court'].' <br> VS <br>'.$r['court']; ?></td>
							<td><?php echo $r['next_hiring_date']; ?></td>
							<td><?php echo $r['status']; ?></td>
							<td>
								<a href="<?php echo site_url('edit-case/'.$r['id']); ?>" class="btn btn-info btn-sm">Edit</a>
								<a href="<?php echo site_url('remove-case/'.$r['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
							</td>
						</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
		</div>
	</div>
</div>
		

		