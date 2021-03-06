<?php

if (! defined('BASEPATH')) exit('No direct script access allowed');

class Site_security extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function make_hash($password)
    {
        $hashed_pass = md5($password);
        return $hashed_pass;
    }

    function salt($password)
    {
        $salted_pass = $password .="matrika";
        return $salted_pass;
    }

    function make_sure_is_admin()
    {
        $user_id = $this->session->userdata('user_id');
        $username = $this->session->userdata('username');
        
        if (is_numeric($user_id) && ($username == 'Admin')) {
            return TRUE;
        } else {
            redirect(base_url());
        }
    }
    
    
    function is_logged_in()
    { 
        $user_id = $this->session->userdata('user_id');
        
        if (is_numeric($user_id)) {
            return TRUE;
        } else {
            $this->session->set_flashdata('notify', '<div class="ink-alert basic align-center" role="alert">Please login to continue</div>');
            redirect('users/login');
        }
    }
    
    
}