<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Course extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Define a global variable to store data that is then used by the end view page.
        $this->data = null;
        $this->load->model("course_model");

    }

    public function index()
    { 
        // $this->load->model("common_model");
        // $this->data['data'] = $this->common_model->get_page_data_by_slug("about-us");
        // $this->data['page'] = $this->common_model->get_page();

        $this->data['asset_manifest'] = 'home.ini';
        $this->data['course'] = $this->course_model->get_course();
        $this->data['content'] = array('view' => 'content/course_view', $this->data);

        $this->load->view('templates/template_public', $this->data);
    }

    public function detail($id)
    {
        $decode_id = base64_decode($id); 
        $this->data['asset_manifest'] = 'home.ini';
        $this->data['c_detail'] = $this->course_model->get_course_detail($decode_id);
        $this->data['r_c_detail'] = $this->course_model->get_retated_course_detail($decode_id);
        // print_r( $this->data['r_c_detail']);die();
        $this->data['content'] = array('view' => 'content/course_detail_view', $this->data);

        $this->load->view('templates/template_public', $this->data);
    }

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */