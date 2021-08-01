<?php
/* 
 * Developed by Hafiz Hassan 
 * Phon# +92303 7859398
 * Date: 28/6/2021
 */
 
class Manage_items extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
    } 

    /*
     * Listing of items
     */
    function index()
    {
        $data['results'] = $this->dashboard->get_all_salestax();
        
        $data['_view'] = 'items/index';
        $this->load->view('layouts/main',$data);
    }

    function view($id)
    {   
        // check if the items exists before trying to edit it
        $data['items'] = $this->dashboard->get_items($id);
        
        if(isset($data['items']['id']))
        {
            $data['_view'] = 'items/view';
            $this->load->view('layouts/main',$data);  
        }
        else
            show_error('The sales tax you are trying to edit does not exist.');
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
                for($row=3; $row<=$highestRow; $row++)
                {
                    $status = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $business_name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $reg_num = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $password = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $pin_code = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $march = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $april = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $may = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $june = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $july = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $aug = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    $sep = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                    $oct = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                    $nov = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                    $dec = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                    $jan = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                    $feb = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                    if ($business_name) {
                        $params[] = array(
                            'business_name' => $business_name,
                            'registration_no' => $reg_num,
                            'password' => $password,
                            'pin_code' => $pin_code,
                            'year' => date('Y'),
                            'month' => 'march,april,may,june,july,aug,sep,oct,nov,dec,jan,feb',
                            'tax_amount' => '0,0,0,0,0,0,0,0,0,0,0,0',
                            // 'month' => $march.','.$april.','.$may.','.$june.','.$july.','.$aug.','.$sep.','.$oct.','.$nov.','.$dec.','.$jan.','.$feb,
                            'status' => $status,
                            'created_by' => $this->session->userdata('id'),
                        );
                    }
                }
            }
            $clients_id = $this->admin->add_batch_record('items',$params);
            $this->session->set_flashdata('success', "Excelsheet Data uploaded Successfully");
           redirect('manage-sales-tax');
        }
        else
        {            
            $data['_view'] = 'items/import';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new items
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('registration_no','Registration No','required');
        $this->form_validation->set_rules('pin_code','Pin Code','required');
        $this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run())     
        {   
            $months = implode(',', $_POST['month']);
            $tax = implode(',', $_POST['tax_amount']);
            $params = array(
                'business_name' => $this->input->post('business_name'),
                'name' => $this->input->post('name'),
                'registration_no' => $this->input->post('registration_no'),
                'password' => md5($this->input->post('password')),
                'pin_code' => $this->input->post('pin_code'),
                'year' => $this->input->post('year'),
                'month' => $months,
                'tax_amount' => $tax,
				'created_by' => $this->session->userdata('id'),
            );

            $tax_id = $this->admin->add_record('items',$params);
            if ($this->input->post('feild')) {
                foreach ($this->input->post('feild') as $v) {
                    $params2[]=array(
                        'sales_id' => $tax_id,
                        'feild_value' => $v
                    );
                }
                $this->admin->add_batch_record('sales_morefeilds',$params2);
            }
            redirect('manage-sales-tax');
        }
        else
        {            
            $data['_view'] = 'items/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a items
     */
    function edit($id)
    {   
        // check if the items exists before trying to edit it
        $data['items'] = $this->dashboard->get_items($id);
        
        if(isset($data['items']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('registration_no','Registration No','required');
            $this->form_validation->set_rules('pin_code','Pin Code','required');
			if($this->form_validation->run())     
            {   
                $months = implode(',', $_POST['month']);
                $tax = implode(',', $_POST['tax_amount']);
                $params = array(
                    'business_name' => $this->input->post('business_name'),
                    'name' => $this->input->post('name'),
                    'registration_no' => $this->input->post('registration_no'),
                    'pin_code' => $this->input->post('pin_code'),
                    'year' => $this->input->post('year'),
                    'month' => $months,
                    'tax_amount' => $tax
                );
                if ($this->input->post('password')) {
                    $params['password'] = md5($this->input->post('password'));
                }
                $this->admin->update_record('items',$id,$params);  
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
                $data['_view'] = 'items/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The sales tax you are trying to edit does not exist.');
    } 

    /*
     * Deleting items
     */
    function remove($id)
    {
        $items = $this->admin->get_record('items',$id);

        // check if the items exists before trying to delete it
        if(isset($items['id']))
        {
            $this->admin->delete_special_record('sales_morefeilds','sales_id',$id);
            $this->admin->delete_record('items',$id);
            redirect('manage-sales-tax');
        }
        else
            show_error('The sales tax you are trying to delete does not exist.');
    }
    
}
