<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->ci = & get_instance();

        // log_message('debug', 'Auth_Ldap initialization commencing...');
        
        // Load the session library
        $this->load->library('session');

        // Load tweet model
        $this->load->model('user_model');
        
    }

    public function index() {
        $data['title'] = 'Login Form';
        // $data['main_content'] = 'login/form';
        $this->load->view('login/form', $data);
    }

    public function validate() {
        
        
        
        $query = $this->user_model->validate();
        if ($query) { // if the user's credentials validated...
            $data = array(
                'username' => $this->input->post('username'),
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);
            redirect('main/index');
        } else { // incorrect username or password
            // $this->index();
            redirect('login/index');
        }
    }    

    public function logout() {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('is_logged_in');
        $this->session->sess_destroy();
        redirect('login/index');
    }

    public function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            /*echo 'You don\'t have permission to access this page. <a href="login">Login</a>';*/
            die();
            //$this->load->view('login_form');
            redirect('login/index');
        }
    }

    public function cp() {
        if ($this->session->userdata('username')) {
            // load the model for this controller
            $this->load->model('user_model');
            // Get User Details from Database
            $user = $this->membership_model->get_member_details();
            if (!$user) {
                // No user found
                return false;
            } else {
                // display our widget
                $this->load->view('user_widget', $user);
            }
        } else {
            // There is no session so we return nothing
            return false;
        }
    }

}
