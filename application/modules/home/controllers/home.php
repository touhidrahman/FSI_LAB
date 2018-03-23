<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MX_Controller
{

    public function index()
    {
        $first_bit = $this->uri->segment(1);
        $second_bit = $this->uri->segment(2);
        
        $data = array();
        $data['module'] = $first_bit;
        $data['view_file'] = $second_bit;
        
        //if there is no controller called in uri
        if ($first_bit == '' || (($first_bit == 'home') && ($second_bit == ''))) {
            $data['module'] = 'home';
            $data['view_file'] = 'welcome_view';
        }
        
        $this->load->module('template');
        $this->template->dashboard($data);
    }
    

}
