<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Event extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Define a global variable to store data that is then used by the end view page.
        $this->data = null;
        $this->load->model("common_model");
    }

    public function index()
    { 
        $this->data['events'] = $this->common_model->get_events();

        $this->data['asset_manifest'] = 'home.ini';

        $this->data['content'] = array('view' => 'content/event_view', $this->data);

        $this->load->view('templates/template_public', $this->data);
    }

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */