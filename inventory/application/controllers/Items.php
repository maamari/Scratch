<?php
/* 
 * Developed by Hafiz Hassan 
 * Phon# +92303 7859398
 * Date: 28/6/2021
 */
 
class Items extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Items_model');
    } 

    /*
     * Listing of items
     */
    function index()
    {
        $data['items'] = $this->Items_model->get_all_items();
        
        $data['_view'] = 'items/index';
        $this->load->view('layouts/main',$data);
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
                    $number = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $email = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $mobile = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $address = $worksheet->getCellByColumnAndRow(4, $row)->getValue();

                    // $std = $this->student->get_std_admission_no($admission_no);
                    // if(empty($std)){
                        $params[] = array(
                            'name' => $name,
                            'number' => $number,
                            'email' => $email,
                            'mobile' => $mobile,
                            'address' => $address,
                            'created_by' => $this->session->userdata('id'),
                        );
                    // }  
                }
            }
            $items_id = $this->admin->add_batch_record('items',$params);
            $this->session->set_flashdata('success', "Excelsheet Data uploaded Successfully");
           redirect('manage-client');
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

		$this->form_validation->set_rules('description','Description','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
                'description' => $this->input->post('description'),
            );

            $items_id = $this->Items_model->add_items($params);
            redirect('items');
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
        $data['items'] = $this->Items_model->get_items($id);
        
        if(isset($data['items']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('description','Description','required');
			if($this->form_validation->run())     
            {   
                $params = array(
					  'description' => $this->input->post('description'),
              
                );
                $this->Items_model->update_items($id,$params);            
                redirect('items');
            }
            else
            {
                $data['_view'] = 'items/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The items you are trying to edit does not exist.');
    } 

    /*
     * Deleting items
     */
    function remove($id)
    {
        $items = $this->Items_model->get_items($id);

        // check if the items exists before trying to delete it
        if(isset($items['id']))
        {
            $this->Items_model->delete_items($id);
       redirect('items');
        }
        else
            show_error('The items you are trying to delete does not exist.');
    }
    
}
