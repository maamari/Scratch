<?php
/* 
 * Developed by Hafiz Hassan 
 * Phon# +92303 7859398
 * Date: 28/6/2021
 */
 
class Tax_return_client_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tax_return_client by id
     */
    function get_tax_return_client($id)
    {
        $data =$this->db->get_where('tax_return_client',array('id'=>$id))->row_array();
        $this->db->where('tax_id', $id);
        $data['feilds'] = $this->db->get('tax_morefeilds')->result_array();
        return $data;
    }

    function login($params)
    {
        return $this->db->get_where('tax_return_client',$params)->row_array();
    }
        
    /*
     * Get all tax_return_client
     */
    function get_all_tax_return_client($created_by=null)
    {
        // $this->db->order_by('id', 'desc');
        // return $this->db->get('tax_return_client')->result_array();

        $this->db->order_by('id', 'desc');
        $this->db->select('tax_return_client.*,clients.name as client_name');
        $this->db->from('tax_return_client');
        $this->db->join('clients','tax_return_client.client_id=clients.id','left outer');

         if ($this->session->userdata('role') == ADMIN) {
           return $this->db->get()->result_array();
        }
        else
        {
        $this->db->where('tax_return_client.created_by',$created_by);
        return $this->db->get()->result_array();
        }


        
    }
        function tax_return_client_count()
    {
        $this->db->from('tax_return_client');
        return $this->db->count_all_results();
    }   
        
    /*
     * function to add new tax_return_client
     */
    function add_tax_return_client($params)
    {
        $this->db->insert('tax_return_client',$params);
        return $this->db->insert_id();
    }

    function add_morefeild($params)
    {
        return $this->db->insert_batch('tax_morefeilds',$params);
    }
    
    /*
     * function to update tax_return_client
     */
    function update_tax_return_client($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('tax_return_client',$params);
    }
    
    /*
     * function to delete tax_return_client
     */
    function delete_tax_return_client($id)
    {
        return $this->db->delete('tax_return_client',array('id'=>$id));
    }

    function delete_morefeild($id)
    {
        return $this->db->delete('tax_morefeilds',array('tax_id'=>$id));
    }
}
