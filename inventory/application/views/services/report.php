<div class="row">
    <div class="col-md-12">
        <h2>All Reports
        </h2>
    </div>
	<div class="col-md-12" style="overflow-x: scroll">
		<table id="example" class="table table-striped table-bordered">
			<thead>
			<tr>
				<th>Date</th>
				<th>Overall Students</th>
			<!-- 	<th>Address</th> -->
					<th>Students Servey Taken</th>
				<th style="width: 45%">Overall Satisfaction Rate</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($reports as $r){ ?>
				<tr>
					<td><?php echo $r['date_created']; ?></td>
					<td><?php echo $r['overall_students_students']; ?></td>
					<td><?php echo $r['student_servey_taken']; ?></td> 
					<td><?php echo $r['overall_satisfaction_rate']; ?></td>
				
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>


