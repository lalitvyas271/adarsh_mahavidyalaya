<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Page extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("common_model");
        // Load required CI libraries and helpers.
        $this->load->database();

        // Define a global variable to store data that is then used by the end view page.
        $this->data = null;

    }

    public function about_us()
    {
        $this->data['page'] = $this->common_model->get_page();
        $this->data['data'] = $this->common_model->get_page_data_by_slug("about-us");
        $this->data['asset_manifest'] = 'home.ini';

        $this->data['content'] = array('view' => 'content/about_view', $this->data);

        $this->load->view('templates/template_public', $this->data);
    }

    public function privacy_policy()
    {
        $this->load->model("common_model");
        $this->data['data'] = $this->common_model->get_page_data_by_slug("privacy-policy");
        $this->data['page'] = $this->common_model->get_page();

        $this->data['asset_manifest'] = 'home.ini';

        $this->data['content'] = array('view' => 'content/common_page', $this->data);

        $this->load->view('templates/template_public', $this->data);
    }

    public function terms_condition()
    {
        $this->load->model("common_model");
        $this->data['data'] = $this->common_model->get_page_data_by_slug("terms-condition");
        $this->data['page'] = $this->common_model->get_page();

        $this->data['asset_manifest'] = 'home.ini';

        $this->data['content'] = array('view' => 'content/common_page', $this->data);

        $this->load->view('templates/template_public', $this->data);
    }

    public function faq()
    {
        $this->load->model("common_model");
        $this->data['data'] = $this->common_model->get_page_data_by_slug("faq");
        $this->data['page'] = $this->common_model->get_page();

        $this->data['asset_manifest'] = 'home.ini';

        $this->data['content'] = array('view' => 'content/common_page', $this->data);

        $this->load->view('templates/template_public', $this->data);
    }

    public function how_work()
    {
        $this->load->model("common_model");
        $this->data['data'] = $this->common_model->get_page_data_by_slug("how-work");
        $this->data['page'] = $this->common_model->get_page();

        $this->data['asset_manifest'] = 'home.ini';

        $this->data['content'] = array('view' => 'content/common_page', $this->data);

        $this->load->view('templates/template_public', $this->data);
    }
    public function portal_features()
    {
        $this->load->model("common_model");
        $this->data['data'] = $this->common_model->get_page_data_by_slug("portal-features");
        $this->data['page'] = $this->common_model->get_page();

        $this->data['asset_manifest'] = 'home.ini';

        $this->data['content'] = array('view' => 'content/common_page', $this->data);

        $this->load->view('templates/template_public', $this->data);
    }
}

/* End of file Coach_management.php */
/* Location: ./application/controllers/Coach_management.php */