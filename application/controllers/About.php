<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class About extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Define a global variable to store data that is then used by the end view page.
        $this->data = null;

    }

    public function index()
    { 
        // $this->load->model("common_model");
        // $this->data['data'] = $this->common_model->get_page_data_by_slug("about-us");
        // $this->data['page'] = $this->common_model->get_page();

        $this->data['asset_manifest'] = 'home.ini';

        $this->data['content'] = array('view' => 'content/about_view', $this->data);

        $this->load->view('templates/template_public', $this->data);
    }

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */