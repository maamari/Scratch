<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {
	  function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Services_model');
        $this->load->model('Items_model');
        // $this->load->model('Results_model');
      
    } 
	public function index()
	{
		  $data['users_count'] = $this->User_model->users_count();
		    $data['services_count'] = $this->Services_model->services_count();
		     $data['items'] = $this->Items_model->items_count();
		       // $data['results_count'] = $this->Results_model->results_count();
		 
        $data['_view'] = 'dashboard';
		$this->load->view('layouts/main',$data);
	}
}
