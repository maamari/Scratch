<?php
/* 
 * Developed by Hafiz Hassan 
 * Phon# +92303 7859398
 * Date: 2/7/2020
 */
 
class Dashboard_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get job by id
     */
    function get_job($id)
    {
        return $this->db->get_where('jobs',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all job count
     */
    function get_all_job_count()
    {
        $this->db->from('jobs');
        return $this->db->count_all_results();
    }

    function get_all_apllication_count()
    {
        $this->db->from('applications');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all tbl_account
     */
    function get_all_jobs($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        if ($this->session->userdata('role') == USER) {
            $this->db->where('created_by',$this->session->userdata('id'));
        }
        return $this->db->get('jobs')->result_array();
    }

    function get_all_apllications($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->select('applications.*,jobs.title,jobs.created_by');
        $this->db->join('jobs', 'jobs.id=applications.job_id','left outer');
        if ($this->session->userdata('role') == USER) {
            $this->db->where('jobs.created_by',$this->session->userdata('id'));
        }
        return $this->db->get('applications')->result_array();
    }
    /*
     * function to add new post
     */
    function add_job($params)
    {
        $this->db->insert('jobs',$params);
        return $this->db->insert_id();
    }

    function add_payment($params)
    {
        $this->db->insert('payments',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update post
     */
    function update_job($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('jobs',$params);
    }
    
    /*
     * function to delete post
     */
    function delete_job($id)
    {
        return $this->db->delete('jobs',array('id'=>$id));
    }
}
