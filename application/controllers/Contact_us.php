<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Contact_us extends CI_Controller
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
        // $this->data['page'] = $this->common_model->get_page();
        $this->data['asset_manifest'] = 'home.ini';

        $this->data['content'] = array('view' => 'content/contact_us_view', $this->data);

        $this->load->view('templates/template_public', $this->data);
    }

    public function save()
    {
        $this->load->model("common_model");
        $id = $this->common_model->save_contact_details();
        if ($id) {
            ajax_response(1, "Success");
        } else {
            ajax_response(0, "Failed");
        }
    }

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */