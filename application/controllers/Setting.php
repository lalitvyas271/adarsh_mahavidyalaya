<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Setting extends CI_Controller
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
        $this->load->model("setting_model");
    }

    public function index()
    {
        $user_id = $this->session->userdata()['auth']['user']['id'];
        $this->data['mail_phone'] = $this->setting_model->get_email_phone($user_id);
        $this->data['asset_manifest'] = 'dashboard.ini';
        $this->data['content'] = array('view' => 'content/setting');
        //prd($this->data);
        $this->load->view('templates/template_public_post_login_view', $this->data);
    }

    public function edit_name()
    {
        $id = $this->input->post("nnid");
        $name = $this->input->post("name");
        $this->setting_model->edit_name($id, $name);
        $detailsData = $this->session->userdata();
        $detailsData['auth']['user']['username'] = $name;
        $this->session->set_userdata($detailsData);
        ajax_response(1, "experience edit successfully.");
    }

    public function edit_mail()
    {
        $this->load->library("friendlyapi");
        $id = $this->session->userdata()['auth']['user']['id'];
        $email = $this->input->post("email");
        //one line for mail verification
        $uri = "common/sendNotification/confirmation";
        $user_mail_url = BASE_URL . "setting/verify_student_email/" . $id;
        $parametes = [
            'toEmail' => $email,
            'verify_url' => $user_mail_url,
        ];
        $response = $this->friendlyapi->call($uri, 'post', $parametes);
        if($response->status == 'success'){
            $this->setting_model->edit_mail($id, $email);   
        }
        echo json_encode($response);
    }

    //fnction for mail verification button

    public function verify_student_email($id)
    {
        $this->db->where('id', $id);
        $row_update = $this->db->update("user", [
            "email_verified" => 1,
        ]);
        if ($row_update) {
            redirect('/setting');
        }
    }
    //code for sent otp
    public function sendOtp()
    {
        $this->load->library("friendlyapi");
        $mobile = $this->input->post("mobile");
        $uri = "common/sendOtp";
        $parametes = [
            'mobile_number' => $mobile,
            'reason' => 'REGISTER',
        ];

        $response = $this->friendlyapi->call($uri, 'get', $parametes);
        echo json_encode($response);
    }

    //Verification otp
    public function verifyOtp()
    {
        $this->load->library("friendlyapi");
        $otp = $this->input->post("otp");
        $request_id = $this->input->post("request_id");
        $uri = "common/verifyOtp";
        $parametes = [
            'request_id' => $request_id,
            'otp' => $otp,
        ];
        $response = $this->friendlyapi->call($uri, 'get', $parametes);
        if ($response) {
            //update mobile number
            $id = $this->session->userdata()['auth']['user']['id'];
            $phone = $this->input->post("mobile");
            $this->setting_model->edit_contact($id, $phone);

            $update_status = $this->setting_model->update_mobile_status($this->session->userdata()['auth']['user']['id']);
        }
        echo json_encode($response);
    }
   
    //resend otp
    public function resendOtp()
    {
        $this->load->library("friendlyapi");
        $uri = "common/resendOtp";
        $request_id = $this->input->post("request_id");
        $mobile = $this->input->post("phone");
        $parametes = [
            'request_id' => $request_id,
            'mobile' => $mobile,
        ];
        $response = $this->friendlyapi->call($uri, 'get', $parametes);
        echo json_encode($response);
    }

    //old password verification function
    public function oldpwdverify()
    {
        $oldpassword = $this->input->post("oldpassword");
        $encrypt = $this->session->userdata()['auth']['user']['password'];
        $match = password_verify($oldpassword, $encrypt);
        if ($match) {
            ajax_response(1, "Password is matched.");
        } else {
            ajax_response(0, "password not matched.");
        }
    }

    //change password function
    public function change_password()
    {
        $newpassword = $this->input->post("password");
        $this->db->where('id', $this->session->userdata()['auth']['user']['id']);
        $row_update = $this->db->update("user", [
            "password" => password_hash($newpassword, PASSWORD_DEFAULT),
        ]);
        if ($row_update) {
            ajax_response(1, "Password changes successfully");
        } else {
            ajax_response(0, "Password change failed.");
        }
    }
}

/* End of file Coach_management.php */
/* Location: ./application/controllers/Coach_management.php */