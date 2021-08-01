<?php
/* 
 * Developed by Hafiz Hassan 
 * Phon# +92303 7859398
 * Date: 28/6/2021
 */
 
class cases extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
    } 

    /*
     * Listing of cases
     */
    function index()
    {
        $data['results'] = $this->admin->get_all_records('cases');
        
        $data['_view'] = 'cases/index';
        $this->load->view('layouts/main',$data);
    }

    function case_type()
    {
           $this->load->library('form_validation');

        $this->form_validation->set_rules('title','Title','required');
        // $this->form_validation->set_rules('description','Description','required');
        
        if($this->form_validation->run())
        {
            $params = array(
                'casetype_title' => $this->input->post('title'),
            );

            if ($this->input->post('id')) {
                $form_id = $this->admin->update_record('case_types', $this->input->post('id'),$params);
                $this->session->set_flashdata('success', 'Record updated successfully');
            }else{
                $form_id = $this->admin->add_record('case_types',$params);
                $this->session->set_flashdata('success', 'Record added successfully');  
            }
            redirect('case-types');
        }else{
            $data['results'] = $this->admin->get_all_records('case_types');
            
            $data['_view'] = 'settings/case_type';
            $this->load->view('layouts/main',$data);
        }
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
                    $name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $reg_num = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $password = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $pin_code = $worksheet->getCellByColumnAndRow(3, $row)->getValue();

                    $params[] = array(
                        'name' => $name,
                        'registration_no' => $reg_num,
                        'password' => md5($password),
                        'pin_code' => $pin_code,
                        'created_by' => $this->session->userdata('id'),
                    );
                }
            }
            $clients_id = $this->admin->add_batch_record('cases',$params);
            $this->session->set_flashdata('success', "Excelsheet Data uploaded Successfully");
           redirect('manage-sales-tax');
        }
        else
        {            
            $data['_view'] = 'cases/import';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new cases
     */
    function add()
    {    
        $this->load->library('form_validation');

		$this->form_validation->set_rules('case_no','Case No','required');
        $this->form_validation->set_rules('case_type','Case Type','required');
        $this->form_validation->set_rules('act','Act','required');
        $this->form_validation->set_rules('registration_no','Registration No','required');
        $this->form_validation->set_rules('filing_num','Filing Number','required');
        $this->form_validation->set_rules('registration_date','Registration Date','required');
        $this->form_validation->set_rules('fhearing_date','First Hearing Date','required');
        $this->form_validation->set_rules('court_no','Court No','required');
        $this->form_validation->set_rules('judge_type','Judge Type','required');
        $this->form_validation->set_rules('next_hiring_date','Next Hiring Date','required');

		if($this->form_validation->run())     
        {   
            $params = array(
                'case_no' => $this->input->post('case_no'),
                'case_type' => $this->input->post('case_type'),
                'case_sub_type' => $this->input->post('case_sub_type'),
                'case_stage' => $this->input->post('case_stage'),
                'act' => $this->input->post('act'),
                'registration_no' => $this->input->post('registration_no'),
                'registration_date' => $this->input->post('registration_date'),
                'filing_num' => $this->input->post('filing_num'),
                'fhearing_date' => $this->input->post('fhearing_date'),
                'filing_date' => $this->input->post('filing_date'),
                'description' => $this->input->post('description'),
                'police_statio' => $this->input->post('police_statio'),
                'fir_number' => $this->input->post('fir_number'),
                'fir_date' => $this->input->post('fir_date'),
                'court_no' => $this->input->post('court_no'),
                'court_type' => $this->input->post('court_type'),
                'court' => $this->input->post('court'),
                'judge_type' => $this->input->post('judge_type'),
                'judge_name' => $this->input->post('judge_name'),
                'next_hiring_date' => $this->input->post('next_hiring_date'),
                'remakrs' => $this->input->post('remakrs'),
                'status' => 'pending',
				'created_by' => $this->session->userdata('id'),
            );

            $case_id = $this->admin->add_record('cases',$params);
            redirect('cases');
        }
        else
        {
            $data['ctypes'] = $this->admin->get_all_records('case_types');
            $data['csubtypes'] = $this->admin->get_all_records('case_subtypes');
            $data['cstages'] = $this->admin->get_all_records('case_stages');
            $data['courts'] = $this->admin->get_all_records('courts');
            $data['courtypes'] = $this->admin->get_all_records('court_types');
            $data['jtypes'] = $this->admin->get_all_records('judge_types');

            $data['_view'] = 'cases/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a cases
     */
    function edit($id)
    {   
        // check if the cases exists before trying to edit it
        $data['cases'] = $this->dashboard->get_cases($id);
        
        if(isset($data['cases']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('registration_no','Registration No','required');
            $this->form_validation->set_rules('pin_code','Pin Code','required');
			if($this->form_validation->run())     
            {   
                $params = array(
                'name' => $this->input->post('name'),
                'registration_no' => $this->input->post('registration_no'),
                'pin_code' => $this->input->post('pin_code'),
                );
                if ($this->input->post('password')) {
                    $params['password'] = md5($this->input->post('password'));
                }
                $this->admin->update_record('cases',$id,$params);  
                if ($this->input->post('feild')) {
                    $this->admin->delete_special_record('sales_morefeilds','sales_id',$id);
                    foreach ($this->input->post('feild') as $v) {
                        $params2[]=array(
                            'sales_id' => $id,
                            'feild_value' => $v
                        );
                    }
                    $this->admin->add_batch_record('sales_morefeilds',$params2);
                }          
                redirect('manage-sales-tax');
            }
            else
            {
                $data['_view'] = 'cases/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The sales tax you are trying to edit does not exist.');
    } 

    /*
     * Deleting cases
     */
    function remove($id)
    {
        $cases = $this->admin->get_cases($id);

        // check if the cases exists before trying to delete it
        if(isset($cases['id']))
        {
            $this->admin->delete_record('cases',$id);
            redirect('manage-sales-tax');
        }
        else
            show_error('The sales tax you are trying to delete does not exist.');
    }
    
}
