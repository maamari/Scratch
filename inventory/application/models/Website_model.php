<?php
/* 
 * Developed by Hafiz Hassan 
 * Phon# +92303 7859398
 * Date: 2/7/2020
 */
 
class Website_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }

    function login($params)
    {
        return $this->db->get_where('users',$params)->row_array();
    }

    /*
     * Get job
     */
    function get_job($id)
    {
        $this->db->select('jobs.*,job_fav.user_id,job_fav.status as fav_status');
        $this->db->join('job_fav', 'job_fav.job_id=jobs.id','left outer');
        if ($this->session->userdata('role') == CLIENT) {
            $this->db->where('job_fav.job_id',$id);
            $this->db->where('job_fav.user_id',$this->session->userdata('id'));
        }
        $this->db->where('jobs.id', $id);
        return $this->db->get_where('jobs')->row_array();
    } 

    function get_fav_job($id)
    {
        $this->db->where('job_id', $id);
        $this->db->where('user_id',$this->session->userdata('id'));
        return $this->db->get_where('job_fav')->row_array();
    }

    function get_save_job($id)
    {
        $this->db->where('job_id', $id);
        $this->db->where('user_id',$this->session->userdata('id'));
        return $this->db->get_where('job_save')->row_array();
    }

    function get_all_jobs($title=null, $location=null)
    {
        $this->db->order_by('id', 'desc');
        if ($title) {
            $this->db->like('title', $title);
        }
        if ($location) {
            $this->db->like('location', $location);
        }
        return $this->db->get('jobs')->result_array();
    }

	public function contact($params)
	{
         $this->db->insert('contacts',$params);
        return $this->db->insert_id();
	}

    function add_application($params)
    {
        $this->db->insert('applications',$params);
        return $this->db->insert_id();
    }

    function save_job($params)
    {
        $this->db->insert('job_save',$params);
        return $this->db->insert_id();
    }

    function fav_job($params)
    {
        $this->db->insert('job_fav',$params);
        return $this->db->insert_id();
    }

    function add_visitor($params)
    {
        $this->db->insert('visitors',$params);
        return $this->db->insert_id();
    }

    function add_user($params)
    {
        $this->db->insert('users',$params);
        return $this->db->insert_id();
    }

    function fav_job_update($id,$params)
    {
        $this->db->where('job_id',$id);
        return $this->db->update('job_fav',$params);
    }

    function save_job_update($id,$params)
    {
        $this->db->where('job_id',$id);
        return $this->db->update('job_save',$params);
    }
}
?>