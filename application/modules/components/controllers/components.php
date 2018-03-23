<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Components extends MX_Controller
{
    function view()
    {
        $comp_id = $this->uri->segment(3);
        $data['comp_data'] = $this->get_where($comp_id);
        $data['view_file'] = 'view_component';
        $this->load->module('template');
        $this->template->dashboard($data);
    }


    function index()
    {
        $data['maincats'] = $this->_custom_query("SELECT maincat FROM maincats ORDER BY maincat");
        $data['majorcats'] = $this->_custom_query("SELECT maincat, majorcat FROM majorcats ORDER BY maincat, majorcat");
        $data['components'] = $this->_custom_query("SELECT * FROM components ORDER BY maincat, majorcat, comp_name");

        $data['view_file'] = 'index';
        $this->load->module('template');
        $this->template->dashboard($data);

    }



    function create ()
    {
        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit', TRUE);

        if ($submit == "Submit")
        // Person has submitted data
        {
            $data = $this->get_data_from_post();
        } else {
            if (is_numeric($update_id)) {
                $data = $this->get_data_from_db($update_id);
            }
            else {
                $data['maincat'] = rawurldecode($this->uri->segment(3));
                $data['majorcat'] = rawurldecode($this->uri->segment(4));
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
            'comp_name' => $this->input->post('comp_name', TRUE),
            'maincat' => $this->input->post('maincat', TRUE),
            'majorcat' => $this->input->post('majorcat', TRUE),
            'probable_cause' => $this->input->post('probable_cause'),
            'description' => $this->input->post('description', TRUE),
            'present_status' => $this->input->post('present_status', TRUE),
            'table_no' => $this->input->post('table_no', TRUE),
            'tag_no' => $this->input->post('tag_no', TRUE),
            'part_no' => $this->input->post('part_no', TRUE),
            'ac_type' => $this->input->post('ac_type', TRUE),
        );
        $this->load->helper('comp_id_helper');
        $data['comp_id'] = make_comp_id($data['table_no'], $data['tag_no']);
        return $data;
    }

    function get_data_from_db($update_id)
    {
        $this->load->model('mdl_components');
        $query = $this->mdl_components->get_where($update_id);
        foreach ($query->result() as $row) {
            $data = array(
            'comp_name' => $row->comp_name,
            'maincat_id' => $row->maincat_id,
            'majorcat_id' => $row->majorcat_id,
            'subcat_id' => $row->subcat_id,
            'probable_cause' => $row->probable_cause,
            'description' => $row->description,
            'present_status' => $row->present_status,
            'table_no' => $row->table_no,
            'tag_no' => $row->tag_no,
            'part_no' => $row->part_no,
            'ac_type' => $row->ac_type,
            'comp_id' => $row->comp_id,
                );
        }

        if (! isset($data)) {
            $data = "";
        }
        return $data;
    }

    function submit()
    {

        //if submit is maincat, majorcat or subcat then load the form again with populated data

                /* $this->load->library('form_validation');

                $this->form_validation->set_rules('page_headline', 'Page Headline', 'required|xss_clean');
                $this->form_validation->set_rules('page_content', 'Page Content', 'required|xss_clean');


                if ($this->form_validation->run() == FALSE)
                {
                    $this->create();
                }
                else
                { */
                    $data = $this->get_data_from_post();

                    // form and upload correct, go for upload/save
                    $update_id = $this->uri->segment(3);
                    if (is_numeric($update_id)) {
                        $this->_update($update_id, $data);
                    } else {
                        $this->_insert($data);
                    }
               /*  } */

            redirect('components');
    }

    function delete($del_id)
    {
        $del_id = $this->uri->segment(3);

        //Change current working dir
        //$old = getcwd(); // Save the current directory
        $dir = './UserFiles/Image/';
        //chdir($dir);

        $query = $this->get_where($del_id);
        foreach ($query->result() as $row) {
            $path_to_file = $dir.$row->story_image;

            if (is_file($path_to_file))
            {
                @unlink($path_to_file);
            }
        }
        //chdir($old); // Restore the old working directory

        $this->_delete($del_id);
        redirect('components');
    }


    public function find()
    {
        $data['ac_types'] = $this->_custom_query("SELECT DISTINCT ac_type FROM components ORDER BY ac_type");
        $data['maincats'] = $this->_custom_query("SELECT maincat FROM maincats ORDER BY maincat");
        $data['majorcats'] = $this->_custom_query("SELECT maincat, majorcat FROM majorcats ORDER BY maincat, majorcat");
        $data['view_file'] = 'find';
        $this->load->module('template');
        $this->template->dashboard($data);
    }


    function find_submit()
    {
        $data = array(
            'comp_name' => $this->input->post('comp_name', TRUE),
            'maincat' => $this->input->post('maincat', TRUE),
            'majorcat' => $this->input->post('majorcat', TRUE),
            'present_status' => $this->input->post('present_status', TRUE),
            'table_no' => $this->input->post('table_no', TRUE),
            'tag_no' => $this->input->post('tag_no', TRUE),
            'part_no' => $this->input->post('part_no', TRUE),
            'ac_type' => $this->input->post('ac_type', TRUE),
        );

        $qry_str = "SELECT * FROM components WHERE ";

        if ($data['comp_name'] != NULL) {$qry_str .= " comp_name='".$data['comp_name']."' AND "; }
        if ($data['maincat'] != NULL) {$qry_str .= " maincat='".$data['maincat']."' AND "; }
        if ($data['majorcat'] != NULL) {$qry_str .= " majorcat='".$data['majorcat']."' AND "; }
        if ($data['present_status'] != NULL) {$qry_str .= " present_status='".$data['present_status']."' AND "; }
        if ($data['table_no'] != NULL) {$qry_str .= " table_no='".$data['table_no']."' AND "; }
        if ($data['tag_no'] != NULL) {$qry_str .= " tag_no='".$data['tag_no']."' AND "; }
        if ($data['part_no'] != NULL) {$qry_str .= " part_no='".$data['part_no']."' AND "; }
        if ($data['ac_type'] != NULL) {$qry_str .= " ac_type='".$data['ac_type']."' AND "; }
        $qry_str .= " id != 0 ORDER BY comp_name";

        $query['founds'] = $this->_custom_query($qry_str);

        $query['view_file'] = 'found';
        $this->load->module('template');
        $this->template->dashboard($query);

    }



    //obsolute
    function manage()
    {
        $this->load->model('mdl_components');

        //PAGINATION
        $this->load->library('pagination');

        $total_rows = $this->mdl_components->count_all();

        $config['base_url'] = site_url('pages/manage');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 40;
        $config['num_links'] = 20;
        //$config['uri_segment'] = 3;
        $config['full_tag_open'] = '<div class="button-group">';
        $config['full_tag_close'] = '</div>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<button class="ink-button">';
        $config['first_tag_close'] = '</button>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<button class="ink-button">';
        $config['last_tag_close'] = '</button>';
        $config['next_link'] = 'Next &gt;&gt;';
        $config['next_tag_open'] = '<button class="ink-button">';
        $config['next_tag_close'] = '</button>';
        $config['prev_link'] = '&lt;&lt; Previous';
        $config['prev_tag_open'] = '<button class="ink-button">';
        $config['prev_tag_close'] = '</button>';
        $config['cur_tag_open'] = '<button class="ink-button green"><b>';
        $config['cur_tag_close'] = '</b></button>';
        $config['num_tag_open'] = '<button class="ink-button">';
        $config['num_tag_close'] = '</button>';


        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        $offset = $this->uri->segment(3);
        //$data['query'] = $this->get('published desc');
        $data["query"] = $this->get_with_limit($config["per_page"], $offset, 'published desc');



        $data['view_file'] = 'manage';
        $this->load->module('template');
        $this->template->admin($data);
    }

    /*
     * --------------------------------------
     * PRE-BUILT METHODS
     * --------------------------------------
     */
    function __construct()
    {
        parent::__construct();
    }

    function get($order_by)
    {
        $this->load->model('mdl_components');
        $query = $this->mdl_components->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by)
    {
        $this->load->model('mdl_components');
        $query = $this->mdl_components->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        $this->load->model('mdl_components');
        $query = $this->mdl_components->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value)
    {
        $this->load->model('mdl_components');
        $query = $this->mdl_components->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->load->model('mdl_components');
        $this->mdl_components->_insert($data);
    }

    function _update($id, $data)
    {
        $this->load->model('mdl_components');
        $this->mdl_components->_update($id, $data);
    }

    function _delete($id)
    {
        $this->load->model('mdl_components');
        $this->mdl_components->_delete($id);
    }

    function count_where($column, $value)
    {
        $this->load->model('mdl_components');
        $count = $this->mdl_components->count_where($column, $value);
        return $count;
    }

    function count_all()
    {
        $this->load->model('mdl_components');
        $count = $this->mdl_components->count_all();
        return $count;
    }

    function get_max()
    {
        $this->load->model('mdl_components');
        $max_id = $this->mdl_components->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query)
    {
        $this->load->model('mdl_components');
        $query = $this->mdl_components->_custom_query($mysql_query);
        return $query;
    }

    /*
     * --------------------------------------
     * END PRE-BUILT METHODS
     * --------------------------------------
     */

}
