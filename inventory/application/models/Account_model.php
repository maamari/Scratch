<?php
/* 
 * Developed by Hafiz Hassan 
 * Phon# +92303 7859398
 * Date: 2/7/2020
 */
 
class Account_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tbl_account by id
     */
    function login($params)
    {
        return $this->db->get_where('users',$params)->row_array();
    }

    function get_account($id)
    {
        return $this->db->get_where('users',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all tbl_account count
     */
    function get_all_account_count()
    {
        $this->db->from('users');
        return $this->db->count_all_results();
    }

    function get_all_visitor_count()
    {
        $this->db->from('visitors');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all tbl_account
     */
    function get_all_accounts($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('users')->result_array();
    }

    function get_all_visitor($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->select('visitors.*,stores.name');
        $this->db->join('stores', 'stores.id=visitors.store_id','left outer');
        return $this->db->get('visitors')->result_array();
    }
        
    /*
     * function to add new account
     */
    function add_account($params)
    {
        $this->db->insert('users',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update account
     */
    function update_account($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('users',$params);
    }
    
    /*
     * function to delete tbl_account
     */
    function delete_account($id)
    {
        return $this->db->delete('users',array('id'=>$id));
    }
}
