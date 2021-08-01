<?php
/* 
 * Developed by Hafiz Hassan 
 * Phon# +92303 7859398
 * Date: 2/7/2020
 */
	class Website extends CI_Controller
	{
		public function __construct()
  		{
    		parent::__construct();	
    		$this->load->model('Website_model');
    		$this->load->model('Account_model');
    		if($this->session->userdata("role") == USER || $this->session->userdata("role") == ADMIN){
				redirect('dashboard');
			}
	 	}

		function index()
		{
			// $this->get_visitor();

			$data['_view'] = 'home';
        	$this->load->view('layouts/main',$data);
		}

		function search()
		{
			if (isset($_POST) && count($_POST) > 0) {
				$data['title'] = $_POST['title'];
				$data['loc'] = $_POST['location'];
				$data['posts']  = $this->Website_model->get_all_jobs($_POST['title'],$_POST['location']);
				// echo "<pre>"; print_r($data['posts']);exit();

				$data['_view'] = 'search';
        		$this->load->view('layouts/main',$data);			
			}else{
				redirect('website');
			}
		}

		function save_job($id)
		{
			if (empty($this->session->userdata('id'))) {
				$this->session->set_flashdata('info', 'Please Login before save your job.');
				redirect('website');
			}else{
				$exist  = $this->Website_model->get_save_job($id);
				if (empty($exist)) {
					$params = array(
						'user_id' => $this->session->userdata('id'),
						'job_id' => $id,
						'status' => ACTIVE
						 );
					$data['title'] = $_POST['title'];
					$data['loc'] = $_POST['location'];
					$save_job_id  = $this->Website_model->save_job($params);
					$this->session->set_flashdata('success', 'Save your job successfully.');
					redirect('website');
				}else{
					$params = array(
						'status' => INACTIVE
						 );
					$save_job_id  = $this->Website_model->save_job_update($id,$params);
					$this->session->set_flashdata('success', 'Remove saved job successfully.');
					redirect('website');
				}
					
			}			
			
		}

		function fav_job($id)
		{
			if (empty($this->session->userdata('id'))) {
				$this->session->set_flashdata('info', 'Please Login before add favourite job.');
				redirect('website');
			}else{
				$exist  = $this->Website_model->get_fav_job($id);
				if (empty($exist)) {
					$params = array(
						'user_id' => $this->session->userdata('id'),
						'job_id' => $id,
						'status' => ACTIVE
						 );
					$fav_job_id  = $this->Website_model->fav_job($params);
					$this->session->set_flashdata('success', 'Add Favourite successfully.');
					redirect('website');
				}else{
					$params = array(
						'status' => INACTIVE
						 );
					$fav_job_id  = $this->Website_model->fav_job_update($id,$params);
					$this->session->set_flashdata('success', 'Remove Favourite successfully.');
					redirect('website');
				}			
			}
		}

		function job_detail($id)
		{
			$job = $this->Website_model->get_job($id);
			// echo "<pre>";print_r($job);exit();
			echo '<h5 style="font-weight: bold">'.$job['title'].'</h5>';
			echo '<p style="line-height: 1.5rem !important;font-size: 1rem;font-weight: 400;color: #2d2d2d !important">'.$job['company'].'</p>';
			echo '<span><button class="btn btn-primary" onclick="appy_job('.$id.')" data-toggle="modal" data-target="#applymodal" style="background: #1c56ac !important">Apply Now</button> 
				<a href="'.base_url('website/fav_job/'.$id).'"><button  class="btn btn-default" title="Add Favourite"><i class="';if ($job['fav_status'] == ACTIVE) {
					echo'fa fa-heart"';
				}else{echo'fa fa-heart-o"';}echo'></i></button></a></span><hr>';
			echo '<div style="overflow-y: scroll;height: 200px"> <p><i class="fa fa-map-marker"></i> <span>'.$job['location'].'</span></p>';
			echo '<p><i class="fa fa-briefcase"></i> ';if ($job['type'] == ACTIVE) {
						echo "Full Time";
					}elseif ($job['type'] == ACTIVE) {
						echo "Part Time";
					}echo'</p>';
			echo '<p><span><i class="fa fa-money" style="font-weight: 300"></i> '.$job['salary'].'</span></p>
			 	<p style="color: #767676">'.$job['description'].' </p>
			 	<p>Education: </p>
			 	<p><i class="fa fa-circle" style="font-size: 10px;"></i> '.$job['education'].'</p>
			 	<p>Location: </p>
			 	<p><i class="fa fa-circle" style="font-size: 10px;"></i> '.$job['location'].'</p></div>';
		}

		function job_apply($id)
		{
			$job = $this->Website_model->get_job($id);
			echo '<div class="login mx-auto">';
			echo '<h5 style="font-weight: bold">'.$job['title'].'</h5>';
			echo '<p style="line-height: 1.5rem !important;font-size: 1rem;font-weight: 400;color: #2d2d2d !important">'.$job['company'].'</p>';
			echo form_open_multipart('website/appy_job/'.$id);
			echo '<div class="form-group">
                    <label class="mb-2">Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group">
                    <label class="mb-2">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                    <small id="emailHelp" class="form-text text-muted">We shell never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label class="mb-2">Phone Number(optional)</label>
                    <input type="text" name="phone" class="form-control" id="phone">
                </div>
                <div class="form-group">
                    <label class="mb-2">CV <span class="required">*</span> </label>
                    <input type="file" name="cv" class="form-control" id="cv">
                    <small id="emailHelp" class="form-text text-muted">.pdf, .docx</small>
                </div>
                <div class="form-group">
                    <label class="mb-2" id="ad" onclick="add_letter()" style="cursor: pointer;color: #085ff7"><i class="fa fa-plus"></i> Add cover letter</label>
                    <label class="mb-2" id="msg" style="display: none;">Message (optional)</label>
                    <textarea class="form-control" name="cover_letter" id="letter" rows="3" style="resize: none;display: none;"></textarea>
                </div>
                <button type="submit" class="btn btn-primary submit mt-2">Continue</button>
                <button type="button" class="btn btn-default mt-2" data-dismiss="modal" aria-label="Close">Cancel</button>';
                echo form_close();
                echo "</div>";

		}

		function appy_job($job_id)
		{
			if (isset($_POST) && count($_POST) > 0) {
				$params = array(
					'job_id' => $job_id,
					'name' => $_POST['name'], 
					'email' => $_POST['email'], 
					'phone' => $_POST['phone'], 
					'cover_latter' => $_POST['cover_letter']
				);
				$config['upload_path'] = 'uploads/cv';
	            $config['allowed_types'] = 'pdf|docx|png|jpg';
	            $this->load->library('upload',$config);
	            if(!empty($_FILES['cv']['name'])){
	                $this->upload->do_upload('cv');
	                $uploadedImage = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
	                $params['cv']= $uploadedImage['file_name'];
	            }
				// echo "<pre>"; print_r($data['posts']);exit();
				$appy_job_id = $this->Website_model->add_application($params);
				$this->session->set_flashdata('success', 'Your application send successfully.');
				redirect('website/index');			
			}else{
				redirect('website');
			}
		}

		function get_visitor()
		{
			$ip = '';
		    if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
		        $ip = $_SERVER['HTTP_CLIENT_IP']; 
		    } 
		    else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
		        $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
		    } 
		    else { 
		        $ip = $_SERVER['REMOTE_ADDR']; 
		    } 
		    // $ip = '37.111.135.107';
		    $json     = file_get_contents("http://ipinfo.io/$ip/geo");
            $json     = json_decode($json, true);
            $country  = $json['country'];
            $region   = $json['region'];
            $city     = $json['city'];
            $timezone = $json['timezone'];
			date_default_timezone_set($timezone);
			$datetime = date('Y-m-d h:m:i');

			$params = array(
				'country' => $country,
				'region' => $region,
				'city' => $city,
				'click_datetime' => $datetime
				 );
			// print_r($params);exit();
			$this->Website_model->add_visitor($params);
		}

		function signup()
		{
			if (isset($_POST) && count($_POST) > 0) {
				if ($_POST['password'] != $_POST['cpass']) {
					 $this->session->set_flashdata('error', 'Confirm password is not matched');
					redirect('website/index');
				}else{
					$params = array(
						'name' => $this->input->post('name'),
						'phone' => $this->input->post('phone'),
						'email' => $this->input->post('email'),
						'password' =>	md5($this->input->post('password')),
						'role' => CLIENT
					);	
					$this->Account_model->add_account($params);
					redirect('website');
				}	
			}else{
				redirect('website');
			}
		}

		public function contact_us()
		{
			$post = $this->input->post();
			if(isset($_POST) && count($_POST) > 0)
			{
				$params = array(
					'name' => $_POST['fname'].' '.$_POST['lname'] ,
					'email' => $_POST['email'],
					'phone' => $_POST['phone'],
					'message' => $_POST['message'],
					 );
				$this->Website_model->contact($params);
				$this->session->set_flashdata('info', 'Your feedback submitted successfully.Thank You!!');
				redirect('website');
			}
			else
			{
				echo "Try again!";
			}
		}

	}
?>