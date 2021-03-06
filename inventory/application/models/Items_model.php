<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Items_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get items by id
     */
    function get_items($id)
    {
        return $this->db->get_where('items',array('id'=>$id))->row_array();
    }

    function login($params)
    {
        return $this->db->get_where('items',$params)->row_array();
    }
        
    /*
     * Get all items
     */
    function get_all_items()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('items')->result_array();
    }
    
    function items_count()
    {
        $this->db->from('items');
        return $this->db->count_all_results();
    }   
        
    /*
     * function to add new items
     */
    function add_items($params)
    {
        $this->db->insert('items',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update items
     */
    function update_items($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('items',$params);
    }
    
    /*
     * function to delete items
     */
    function delete_items($id)
    {
        return $this->db->delete('items',array('id'=>$id));
    }
}
