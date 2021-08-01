<div class="card">
	<div class="card-header">
		<h3 class="card-title">Services</h3>
		<div class="pull-right">
			<button class="btn btn-success add" data-toggle="modal" data-target="#service-modal"><i class="fa fa-plus"></i> Add</button>
		</div>
	</div>
	<div class="card-body">
		<table id="myTable" class="table table-striped table-bordered">
			<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Rate</th>
				<th style="width: 12%">Actions</th>
			</tr>
			</thead>
		    <tbody>
			<?php foreach($results as $r){ ?>
				<tr>
					<td><?php echo $r['id']; ?></td>
					<td><?php echo $r['service_title']; ?></td>
					<td><?php echo $r['service_rate']; ?></td>
						<td><button class="btn btn-info btn-sm edit" data-toggle="modal" data-target="#service-modal" onclick="get_service(<?=$r['id']?>)">Edit</button>
						<a href="<?=base_url('service-delete/'.$r['id'])?>" class="btn btn-danger btn-sm">Delete</a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<!-- Modal -->
<div id="service-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      	<div class="modal-header">
        	<h4 class="modal-title">Add Service</h4>
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
      	</div>
      	<?php echo form_open('services'); ?>
      	<div class="modal-body">
	        <div class="form-group">
	        	<label>Service Name</label>
	        	<input type="text" name="title" id="title" class="form-control">
	        </div>
	        <div class="form-group">
	        	<label>Service Rate</label>
	        	<input type="text" name="rate" id="rate" class="form-control">
	        </div>
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-success">Save</button>
      	</div>
      	<?php echo form_close(); ?>
    </div>

  </div>
</div>

<script>
	$(function() {
		$('.add').click(function() {
			$('.modal-title').html('Add Service');
		});
	})
	function get_service(id) {
		$('.modal-title').html('Edit Service');
		$('.modal-body').append('<input hidden name="id" value="'+id+'">');
		$.ajax({
			url:'<?=base_url('dashboard/get_service/')?>'+id,
			method:'POST',
			success: function(resp) {
				resp = $.parseJSON(resp);
				$('#title').val(resp.service_title);
				$('#rate').val(resp.service_rate);
			}
		});
	}
</script>