<?php echo form_open('user/edit/'.$user['id'],array("class"=>"form-horizontal")); ?>
	<div class="row">
		<div class="col-md-6">
			<label for="first_name" class="control-label"><span class="text-danger">*</span>First Name</label>
			<input type="text" name="first_name" value="<?php echo ($this->input->post('first_name') ? $this->input->post('first_name') : $user['first_name']); ?>" class="form-control" id="first_name" />
			<span class="text-danger"><?php echo form_error('first_name');?></span>

		</div>
		<div class="col-md-6">
			<label for="last_name" class="control-label">Last Name</label>
			<input type="text" name="last_name" value="<?php echo ($this->input->post('last_name') ? $this->input->post('last_name') : $user['last_name']); ?>" class="form-control" id="last_name" />
		</div>
		<div class="col-md-6">
			<label for="email" class="control-label">Email</label>
			<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $user['email']); ?>" class="form-control" id="email" />
		</div>
		<div class="col-md-6">
			<label for="password" class="control-label"><span class="text-danger">*</span>Password</label>
			<input type="text" name="password" value="<?php echo $this->input->post('password')?>" class="form-control" id="password" />
		</div>
		<div class="col-md-6">
			<label for="role" class="control-label"><span class="text-danger">*</span>Role</label>
			<select name="role" class="form-control">
				<option value="">select</option>
				<?php
				$role_values = array(
					"Admin" => ADMIN,
					"Manager"=> MANAGER,
					 "Driver"=> DRIVER,
				);

				foreach($role_values as $value => $display_text)
				{
					$selected = ($display_text == $user['role']) ? ' selected="selected"' : "";

					echo '<option value="'.$display_text.'" '.$selected.'>'.$value.'</option>';
				}
				?>
			</select>
			<span class="text-danger"><?php echo form_error('role');?></span>
		</div>
		<div class="form-group">
			<div class="checkbox col-md-6">
				<label>
					<input type="checkbox" name="status" value="<?=ACTIVE?>" <?php echo ($user['status']==ACTIVE ? 'checked="checked"' : ''); ?> id='status' />
					Status
				</label>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="pull-right">
				<button type="submit" class="btn btn-success">Save</button>
			</div>
		</div>
	</div>
	
<?php echo form_close(); ?>