<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends MX_Controller {


    function __construct()
    {
        parent::__construct();
        
    }
    
    
    function dashboard($data)
	{
	   $this->load->module('site_security');
	    $ck = $this->site_security->is_logged_in();
	    if ($ck)
	    {
	        $this->load->view('dashboard', $data);
	    }
	}
    
    function modal($data)
	{
	       $this->load->view('modal', $data);
	}
    
    function cover($data)
	{
	       $this->load->view('cover', $data);
	}
    
	
	
    
    
    function admin_dashboard($data)
	{
	    $this->load->module('site_security');
	    $ck = $this->site_security->is_logged_in();
	    if ($ck)
	    {
	        $this->load->view('dashboard', $data);
	    }
	}
	
    
    function superadmin_dashboard($data)
	{
	    $this->load->module('site_security');
	    $ck = $this->site_security->make_sure_is_admin();
	    if ($ck)
	    {
	       $this->load->view('dashboard', $data);
	    }
	}
	
}
