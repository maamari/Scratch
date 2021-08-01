<?php
/* 
 * Developed by Hafiz Hassan 
 * Phon# +92303 7859398
 * Date: 28/6/2021
 */
 
class Tax_return_client extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tax_return_client_model');
        $this->load->model('Clients_model');
    } 

    /*
     * Listing of tax_return_client
     */
    function index()
    {
        $created_by = $this->session->userdata('id');
        $data['results'] = $this->dashboard->get_all_returntax();
        
        $data['_view'] = 'tax_return_client/index';
        $this->load->view('layouts/main',$data);
        
    }

    function get_invoice($id)
    {
        $exist = $this->dashboard->get_invoice($id);
        echo json_encode($exist);
    }

    function import()
    {   
        if(isset($_FILES["file"]["name"]))
        {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet)
            {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=2; $row<=$highestRow; $row++)
                {
                    $status = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $sno = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $status2 = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $status3 = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $fileloc = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $ntn = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $strn = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $contact = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $reg_no = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $password = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $pin_code = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    $email = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                    $email_password = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                    $business_name = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                    $dob = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                    $address = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                    $remark = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                    if ($business_name) {
                        $client = array('name'=> $name);
                        $client_id = $this->admin->add_record('clients',$client);
                        $params = array(
                            'client_id' => $client_id,
                            'sno' => $sno,
                            'file_loc' => $fileloc,
                            'status' => $status,
                            'status2' => $status2,
                            'ntn' => $ntn,
                            'strn' => $strn,
                            'contact' => $contact,
                            'reg_no' => $reg_no,
                            'password' => $password,
                            'pin_code' => $pin_code,
                            'email' => $email,
                            'email_password' => $email_password,
                            'business_name' => $business_name,
                            'dob' => $dob,
                            'address' => $address,
                            'remark' => $remark,
                            'created_by' => $this->session->userdata('id'),
                        );
                        $this->admin->add_record('tax_return_client',$params);
                    }
                }
            }
            
            $this->session->set_flashdata('success', "Excelsheet Data uploaded Successfully");
           redirect('manage-tax-return');
        }
        else
        {            
            $data['_view'] = 'tax_return_client/import';
            $this->load->view('layouts/main',$data);
        }
    }

    function view($id)
    {   
        // check if the sales_tax exists before trying to edit it
        $data['tax_return_client'] = $this->admin->get_record('tax_return_client',$id);
        
        if(isset($data['tax_return_client']['id']))
        {
            $data['clients'] = $this->admin->get_all_records('clients');
            $data['_view'] = 'tax_return_client/view';
            $this->load->view('layouts/main',$data);  
        }
        else
            show_error('The sales tax you are trying to edit does not exist.');
    } 

    /*
     * Adding a new tax_return_client
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('client_id','Client Name','required');
		 $data['clients'] = $this->Clients_model->get_all_clients();
		if($this->form_validation->run())     
        {   
            $params = array(
                'client_id' => $this->input->post('client_id'),
                'category' => $this->input->post('category'),
                'file_loc' => $this->input->post('file_loc'),
                'status' => $this->input->post('status'),
                'status2' => $this->input->post('status2'),
                'ntn' => $this->input->post('ntn'),
                'strn' => $this->input->post('strn'),
                'contact' => $this->input->post('contact'),
                'reg_no' => $this->input->post('reg_no'),
                'password' => $this->input->post('password'),
                'pin_code' => $this->input->post('pin_code'),
                'email' => $this->input->post('email'),
                'email_password' => $this->input->post('email_password'),
                'business_name' => $this->input->post('business_name'),
                'dob' => $this->input->post('dob'),
                'address' => $this->input->post('address'),
				'created_by' => $this->session->userdata('id'),
            );

            $tax_id = $this->Tax_return_client_model->add_tax_return_client($params);
            if ($this->input->post('feild')) {
                foreach ($this->input->post('feild') as $v) {
                    $params2[]=array(
                        'tax_id' => $tax_id,
                        'feild_value' => $v
                    );
                }
                $this->Tax_return_client_model->add_morefeild($params2);
            }
            redirect('manage-tax-return');
        }elseif (isset($_POST['client']) && count($_POST) > 0) {
            $params = array(
                'name' => $this->input->post('name'),
                'number' => $this->input->post('number'),
                'mobile' => $this->input->post('mobile'),
                'address' => $this->input->post('address'),
                'email' => $this->input->post('email'),
                'created_by' => $this->session->userdata('id'),
            );

            $clients_id = $this->Clients_model->add_clients($params);
            redirect('add-tax');
        }
        else
        {            
            $data['_view'] = 'tax_return_client/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a tax_return_client
     */
    function edit($id)
    {   
        // check if the tax_return_client exists before trying to edit it
        $data['tax_return_client'] = $this->admin->get_record('tax_return_client',$id);
         $data['clients'] = $this->admin->get_all_records('clients');
         if (empty($data['tax_return_client']['feilds'])) {
            $data['feilds'] = 0;
         }else{
            $data['feilds'] = count($data['tax_return_client']['feilds']);
        }
        
        if(isset($data['tax_return_client']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('client_id','Client','required');
			if($this->form_validation->run())     
            {   
                $params = array(
				    'client_id' => $this->input->post('client_id'),
                    'category' => $this->input->post('category'),
                    'file_loc' => $this->input->post('file_loc'),
                    'status' => $this->input->post('status'),
                    'status2' => $this->input->post('status2'),
                    'ntn' => $this->input->post('ntn'),
                    'strn' => $this->input->post('strn'),
                    'contact' => $this->input->post('contact'),
                    'reg_no' => $this->input->post('reg_no'),
                    'pin_code' => $this->input->post('pin_code'),
                    'email' => $this->input->post('email'),
                    'business_name' => $this->input->post('business_name'),
                    'dob' => $this->input->post('dob'),
                     'address' => $this->input->post('address'),
                );
                if ($this->input->post('password')) {
                    $params['password'] = md5($this->input->post('password'));
                }
                if ($this->input->post('email_password')) {
                    $params['email_password'] = md5($this->input->post('email_password'));
                }
                $this->admin->update_record('tax_return_client',$id,$params);  
                if ($this->input->post('feild')) {
                    $this->Tax_return_client_model->delete_morefeild($id);
                    foreach ($this->input->post('feild') as $v) {
                        $params2[]=array(
                            'tax_id' => $id,
                            'feild_value' => $v
                        );
                    }
                    $this->Tax_return_client_model->add_morefeild($params2);
                }          
                redirect('manage-tax-return');
            }
            else
            {
                $data['_view'] = 'tax_return_client/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tax_return_client you are trying to edit does not exist.');
    } 

    /*
     * Deleting tax_return_client
     */
    function remove($id)
    {
        $tax_return_client = $this->Tax_return_client_model->get_tax_return_client($id);

        // check if the tax_return_client exists before trying to delete it
        if(isset($tax_return_client['id']))
        {
            $this->admin->delete_special_record('tax_morefeilds','tax_id',$id);
            $this->admin->delete_record('tax_return_client',$id);
            redirect('manage-tax-return');
        }
        else
            show_error('The tax_return_client you are trying to delete does not exist.');
    }
    
}
