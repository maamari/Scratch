<!-- Post Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog" style="max-width: 700px">
    <div class="modal-content">
      <?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p><?php echo $this->session->flashdata('success'); ?></p>
            </div>
      <?php } ?>
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-plus"></i> New Job</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <?php echo form_open_multipart('dashboard/add'); ?>
      <!-- Modal body -->
      <div class="modal-body">
  	 		<div class="row clearfix">
				<div class="col-md-6">
					<label class="control-label"><span class="text-danger">*</span>Title</label>
					<div class="form-group">
						<input type="text" name="title" value="<?php echo $this->input->post('title'); ?>" class="form-control" id="title" />
						<span class="text-danger"><?php echo form_error('title');?></span>
					</div>
				</div>
				<div class="col-md-6">
					<label class="control-label"><span class="text-danger">*</span>Company</label>
					<div class="form-group">
						<input type="text" name="company" value="<?php echo $this->input->post('company'); ?>" class="form-control" />
						<span class="text-danger"><?php echo form_error('company');?></span>
					</div>
				</div>
				<div class="col-md-6">
					<label class="control-label"><span class="text-danger">*</span>Location</label>
					<div class="form-group">
						<input type="text" name="location" value="<?php echo $this->input->post('location'); ?>" class="form-control" />
						<span class="text-danger"><?php echo form_error('location');?></span>
					</div>
				</div>
				<div class="col-md-6">
					<label class="control-label"><span class="text-danger">*</span>Education</label>
					<div class="form-group">
						<input type="text" name="education" value="<?php echo $this->input->post('education'); ?>" class="form-control" />
						<span class="text-danger"><?php echo form_error('education');?></span>
					</div>
				</div>
				<div class="col-md-6">
					<label class="control-label"><span class="text-danger">*</span>Salary</label>
					<div class="form-group">
						<input type="text" name="salary" value="<?php echo $this->input->post('salary'); ?>" class="form-control" />
						<span class="text-danger"><?php echo form_error('salary');?></span>
					</div>
				</div>
				<div class="col-md-6">
					<label class="control-label"><span class="text-danger">*</span>Job Type</label>
					<div class="form-group">
						<select name="type" class="form-control">
							<option>Select Job Type</option>
							<option value="<?=ACTIVE?>">Full Time</option>
							<option value="<?=INACTIVE?>">Part Time</option>
						</select>
						<span class="text-danger"><?php echo form_error('type');?></span>
					</div>
				</div>
				<div class="col-md-12">
					<label class="control-label"><span class="text-danger">*</span>Description</label>
					<div class="form-group">
						<textarea name="description" class="form-control" rows="4" style="resize: none;"><?php echo $this->input->post('description'); ?></textarea>
						<span class="text-danger"><?php echo form_error('description');?></span>
					</div>
				</div>
			</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
<!-- // Post Modal -->
<div class="container" style="margin:30px 0">
	
  <div class="row">
  	<div class="col-md-12 text-center">
  		<h3><?=$this->session->userdata('name');?>(<?php if ($this->session->userdata('role') == ADMIN) {
  			echo "Admin";
  		}elseif ($this->session->userdata('role') == USER) {
  			echo "User";
  		} ?>) <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-plus"></i> Job</a></h3>
  	</div>
  	<?php foreach ($posts as $p) {?>
  	<div class="col-sm-2"></div>
    <div class="col-sm-10">
    	<a href="#" onclick="post_edit(<?=$p['id']?>)" class="btn btn-info btn-sm"><i class="fa fa-pencil-alt"></i> Edit</a>
    	<?php if ($this->session->userdata('role') == ADMIN) {?>
    	<a href="<?=base_url('dashboard/remove/'.$p['id'])?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
    	<?php }?>
      	<h2><?=$p['title']?></h2>
      	<h5><i class="fa fa-map-marker-alt"></i> <?=$p['location']?></h5>
      	<h5><i class="fa fa-briefcase"></i> <?php if ($p['type'] == ACTIVE) {
						echo "Full Time";
					}elseif ($p['type'] == ACTIVE) {
						echo "Part Time";
					}?></h5>
      	<h5><i class="fa fa-money-bill-alt"></i> <?=$p['salary']?></h5>
      	<p><?=$p['description']?></p>
      	<p><i class="fa fa-graduation-cap"></i> <?=$p['education']?></p>
    </div>
     <?php } ?>
  </div>
</div>
<!-- Edit Post Modal -->
<div class="modal fade" id="editpost">
    <div class="modal-dialog" style="max-width: 700px">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-pencil-alt"></i> Edit Job</h4>
            </div>
            <?php echo form_open_multipart('dashboard/edit'); ?>
            <!-- Modal body -->
            <div class="modal-body" id="job_edit"></div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="submit" name="edit_sz_video" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Save</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- //Edit Post Modal -->
<script>
	function post_edit(id) {
        $("#editpost").modal();
        $.ajax({
            url: "<?=site_url('dashboard/job_edit/');?>"+id,
            success: function (data) {
                $("#job_edit").html(data);
            }
        });
    }
</script>
