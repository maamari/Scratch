<?php
/**
 * Created by PhpStorm.
 * User: Usama Imran (+92 332 7175117)
 * Date: 7/9/2019
 * Time: 3:48 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        if($this->session->userdata("email")){
            redirect('dashboard');
        } else {
            $this->load->view('login');
        }
    }

    public function register()
    {

    }

    public function users()
    {
        $this->load->view('useraccount');
    }

    public function do_login(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run())
        {
            $params = array(
                'password' => md5($this->input->post('password')),
                'email' => $this->input->post('email')
            );
            $data = $this->User_model->login($params);
            if($data){
                $this->session->set_userdata($data);
                redirect('dashboard');
            }else{
                $this->session->set_flashdata('error', 'Username / Password combination does not exist');
                redirect('login', 'refresh');
            }
        } else {
            redirect('login', 'refresh');
        }
    }


    function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}
