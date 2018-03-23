<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Maincats extends MX_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_maincats');
    }
    
    
    
    function index()
    {
        $data['maincats'] = $this->get('maincat');
    
        $data['module'] = 'maincats';
        $data['view_file'] = 'index_maincats';
    
        $this->load->module('template');
        $this->template->dashboard($data);
    }
    
    
    
    function create()
    {
        //if clicked on edit link
        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit', TRUE);
    
        if ($submit == "submit")
        // Person has submitted data
        {
            $data = $this->get_data_from_post();
        } else {
            if (is_numeric($update_id)) {
                $data = $this->get_data_from_db($update_id);
            }
        }
    
        if (! isset($data)) {
            $data = $this->get_data_from_post();
        }
    
        $data['update_id'] = $update_id;
    
        $data['view_file'] = 'create';
        $this->load->module('template');
        $this->template->dashboard($data);
    }
    
    function get_data_from_post()
    {
        $data = array(
            'maincat' => $this->input->post('maincat', TRUE),
            'description' => $this->input->post('description', TRUE),
        );
    
        return $data;
    }
    
    function get_data_from_db($update_id)
    {
        $query = $this->mdl_maincats->get_where($update_id);
        foreach ($query->result() as $row) {
    
            $data = array(
                'maincat' => $row->maincat,
                'description' => $row->description,
            );
        }
    
        if (! isset($data)) {
            $data = "";
        }
        return $data;
    }
    
    function submit()
    {
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('maincat', 'Trade', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'trim');
    
        if ($this->form_validation->run($this) == FALSE) {
            $this->create();
        } else {
            $data = $this->get_data_from_post();
    
            // form correct, go for save
            $update_id = $this->uri->segment(3);
            if (is_numeric($update_id)) {
                $this->_update($update_id, $data);
            } else {
                $this->_insert($data);
            }
    
            redirect('components');
        }
    }
    
    
    
    function delete($del_id)
    {
        $del_id = $this->uri->segment(3);
    
        $this->_delete($del_id);
        redirect('maincats');
    }
    
     
    
    
    
    
    
    
    
    
    
    /* --------------------------------------
     *            PRE-BUILT METHODS
     * -------------------------------------- */
    function get($order_by)
    {
        $query = $this->mdl_maincats->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by)
    {
        $query = $this->mdl_maincats->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        $query = $this->mdl_maincats->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value)
    {
        $query = $this->mdl_maincats->get_where_custom($col, $value);
        return $query;
    }

    function get_where_custom_orderby($col, $value, $orderby)
    {
        $query = $this->mdl_maincats->get_where_custom($col, $value, $orderby);
        return $query;
    }

    function _insert($data)
    {
        $this->mdl_maincats->_insert($data);
    }

    function _update($id, $data)
    {
        $this->mdl_maincats->_update($id, $data);
    }

    function _delete($id)
    {
        $this->mdl_maincats->_delete($id);
    }

    function count_where($column, $value)
    {
        $count = $this->mdl_maincats->count_where($column, $value);
        return $count;
    }

    function count_all()
    {
        $count = $this->mdl_maincats->count_all();
        return $count;
    }
    
    function get_max()
    {
        $max_id = $this->mdl_maincats->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query)
    {
        $query = $this->mdl_maincats->_custom_query($mysql_query);
        return $query;
    }
    
    /* --------------------------------------
     *        END PRE-BUILT METHODS
     * -------------------------------------- */
    /*
     * 1. Every MySQL Table should have a corresponding module
     * 2. Every module has the same name that corresponds the table
     * 3. Controller folders must not contain more than 1 php file
     * 4. Model folders must not contain more than 1 php file
     * 5. View folder can contain many files
     *  */
}