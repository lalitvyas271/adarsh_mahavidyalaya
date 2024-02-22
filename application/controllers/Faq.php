<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Faq extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->aviauth->is_logged_in()) {
            // Preserve any flashdata messages so they are passed to the redirect page.
            if ($this->session->flashdata('message')) {
                $this->session->keep_flashdata('message');
            }
            redirect('');
        }
        // Load required CI libraries and helpers.
        $this->load->database();

        // Define a global variable to store data that is then used by the end view page.
        $this->data = null;
        $this->load->model("faq_model");
    }

    public function index()
    {
        $id = 3;  // 3 is student_id 
        $this->data['faq'] = $this->faq_model->get_faq($id);
        $this->data['content'] = array('view' => 'content/faq');
        $this->data['asset_manifest'] = 'dashboard.ini';
        //prd($this->data);
        $this->load->view('templates/template_public_post_login_view', $this->data);
    }

}

/* End of file Coach_management.php */
/* Location: ./application/controllers/Coach_management.php */