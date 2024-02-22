<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Define a global variable to store data that is then used by the end view page.
        $this->data = null;
        $this->load->library('aviauth');
        $this->load->model("teacher_model");
        $this->load->model("course_model");
        $this->load->model("student_model");
        $this->load->model("common_model");
    }

    public function index()
    {
        // $this->load->model("banner_model");
        // $this->load->model("common_model");
        
        $this->data['banners'] = $this->common_model->get_banners();
        $this->data['teacher'] = $this->teacher_model->get_teacher();
        $this->data['course'] = $this->course_model->get_course();
        $this->data['students'] = $this->student_model->get_students();
        
        // $this->data['footer'] = $this->cms_model->get_footer();
        $this->data['asset_manifest'] = 'home.ini';

        $this->data['content'] = array('view' => 'content/home_view', $this->data);

        $this->load->view('templates/template_public', $this->data);

    }

    public function get_testimonial()
    {
        $this->load->model("common_model");
        $res = $this->common_model->get_testimonial();
        ajax_response(1, "Success", $res);
    }

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */