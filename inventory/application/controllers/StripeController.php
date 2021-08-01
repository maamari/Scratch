<?php

defined('BASEPATH') OR exit('No direct script access allowed');

   

class StripeController extends Admin_Controller {

    public function __construct() {

       parent::__construct();
       $this->load->model('Dashboard_model');

    }

    public function index()
    {
        $this->load->view('my_stripe');
    }

    // post
    public function stripePost()
    {
        require_once('application/libraries/stripe-php/init.php');

        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

        \Stripe\Charge::create ([
                "amount" => 100,
                "currency" => "usd",
                "source" => $this->input->post('stripeToken'),
                "description" => "Test payment from indeed.com." 
        ]); 

        $params = array(
            "amount" => 100,
            "currency" => "usd",
            "source" => $this->input->post('stripeToken'),
            "description" => "Test payment from indeed.com.", 
            "user_id" => $this->session->userdata('id')
        );

        $tbl_account_id = $this->Dashboard_model->add_payment($params);

        $this->session->set_flashdata('success', 'Payment made successfully.');
        redirect('dashboard');

    }

}