<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Forms_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get forms by id
     */
    function get_forms($id)
    {
        return $this->db->get_where('services2',array('id'=>$id))->row_array();
    }
     function get_all_forms2()
    {
       // $this->db->select('services2.*,items.description as desc_name');
       //  $this->db->from('services2');
       //  $this->db->join('items','services2.description=items.id','left outer');
  
       //       return $this->db->get()->result_array();
        $this->db->order_by('id', 'desc');
        return $this->db->get('services2')->result_array();
    }

    function login($params)
    {
        return $this->db->get_where('services2',$params)->row_array();
    }
        
    /*
     * Get all forms
     */
    function get_all_forms()
    {
      $this->db->order_by('id', 'desc');
        return $this->db->get('services2')->result_array();
    }
   
        function forms_count()
    {
        $this->db->from('services2');
        return $this->db->count_all_results();
    }   
        
    /*
     * function to add new forms
     */
    function add_forms($params)
    {
        $this->db->insert('services2',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update forms
     */
    function update_forms($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('services2',$params);
    }
    
    /*
     * function to delete forms
     */
    function delete_forms($id)
    {
        return $this->db->delete('services2',array('id'=>$id));
    }
}
