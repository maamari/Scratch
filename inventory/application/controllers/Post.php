<?php
/* 
 * Developed by Hafiz Hassan 
 * Phon# +92303 7859398
 * Date: 2/7/2020
 */
 
class Post extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
    } 

    /*
     * Listing of tbl_account
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('user/index?');
        $config['total_rows'] = $this->Post_model->get_all_post_count();
        $this->pagination->initialize($config);

        $data['posts'] = $this->Post_model->get_all_post($params);
        
        $data['_view'] = 'post/index';
        $this->load->view('layouts/main',$data);
    }

    function visitor()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('user/visitor?');
        $config['total_rows'] = $this->Account_model->get_all_visitor_count();
        $this->pagination->initialize($config);

        $data['visitors'] = $this->Account_model->get_all_visitor($params);
        
        $data['_view'] = 'visitor';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new tbl_account
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('password','Password','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'isActive' => INACTIVE,
				'password' => md5($this->input->post('password')),
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
            );
            
            $tbl_account_id = $this->Account_model->add_tbl_account($params);
            redirect('user');
        }
        else
        {            
            $data['_view'] = 'user/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a tbl_account
     */
    function edit($u_id)
    {   
        $id = base64_decode(urldecode($u_id));
        // check if the tbl_account exists before trying to edit it
        $data['user'] = $this->Account_model->get_tbl_account($id);
        
        if(isset($data['user']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('name','Name','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
                );

                if ($this->input->post('password')) {
                    $params['password'] = md5($this->input->post('password'));
                }

                $this->Account_model->update_tbl_account($id,$params);            
                redirect('user');
            }
            else
            {
                $data['_view'] = 'user/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The user you are trying to edit does not exist.');
    } 

    /*
     * Deleting tbl_account
     */
    function remove($id)
    {
        $user = $this->Account_model->get_tbl_account($id);

        // check if the tbl_account exists before trying to delete it
        if(isset($user['id']))
        {
            $this->Account_model->delete_tbl_account($id);
            redirect('user/index');
        }
        else
            show_error('The user you are trying to delete does not exist.');
    }
    
}
