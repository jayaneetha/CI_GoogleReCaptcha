<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->config->load('GoogleCaptcha');

        $site_key = $this->config->item('g_captcha_site');

        $this->load->view('welcome_message', array('site_key' => $site_key));
    }

    public function register() {
        $firstName = $this->input->post('firstName');
        $lastName = $this->input->post('lastName');
        $captcha = $this->input->post('g-recaptcha-response');
        $remote_ip = $this->input->server('REMOTE_ADDR');

        $this->config->load('GoogleCaptcha');

        $secret = $this->config->item('g_captcha_secret');

        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=" . $captcha . "&remoteip=" . $remote_ip);
        $json = json_decode($response, TRUE);
        if ($json['success'] == false) {
            echo '<h2>You are spammer !</h2>';
        } else {
            $data = array(
                'firstName' => $firstName,
                'lastName' => $lastName
            );
            $this->load->view('Registered', $data);
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */