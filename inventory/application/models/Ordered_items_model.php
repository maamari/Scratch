<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Ordered_items_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get ordered_items by id
     */
    function get_ordered_items($id)
    {
        return $this->db->get_where('services2',array('id'=>$id))->row_array();
    }
     function get_all_ordered_items2()
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
     * Get all ordered_items
     */
    function get_all_ordered_items()
    {
      $this->db->order_by('id', 'desc');
        return $this->db->get('services2')->result_array();
    }
   
        function ordered_items_count()
    {
        $this->db->from('services2');
        return $this->db->count_all_results();
    }   
        
    /*
     * function to add new ordered_items
     */
    function add_ordered_items($params)
    {
        $this->db->insert('services2',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update ordered_items
     */
    function update_ordered_items($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('services2',$params);
    }
    
    /*
     * function to delete ordered_items
     */
    function delete_ordered_items($id)
    {
        return $this->db->delete('services2',array('id'=>$id));
    }
}