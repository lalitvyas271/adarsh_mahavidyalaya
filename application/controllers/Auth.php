<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
 
    function __construct() 
    {
        parent::__construct();
		
		// Load required CI libraries and helpers.
		$this->load->database();
		$this->load->library('session');
 		$this->load->helper('url');
 		$this->load->helper('form');
		 $this->load->model("retailer_model");
		 $this->load->model("auth_model");
		 
		$this->load->library('aviauth');	
		
		if ($this->aviauth->is_logged_in() && uri_string() != 'auth/logout') 
		{
			// Preserve any flashdata messages so they are passed to the redirect page.
			if ($this->session->flashdata('message')) { $this->session->keep_flashdata('message'); }
			
			redirect('dashboard');
		}
		// Define a global variable to store data that is then used by the end view page.
		$this->data = null;
	}

	
	/**
	 * index
	 * Forwards to 'login'.
	 */ 
	function index()
    {
		$this->login();
	}
 
	/**
	 * login
	 * Login page used by all user types to log into their account.
	 * Users without an account can register for a new account.
	 * Note: This page is only accessible to users who are not currently logged in, else they will be redirected.
	 */ 
    function login()
    {	
		// If 'Login' form has been submited, attempt to log the user in.

		if ($this->input->post()) {
            $this->load->model("auth_model");
            $res = $this->auth_model->login($this->input->post("mobile"), $this->input->post("password"));
            if($res == false){
				ajax_response(0, "Login unsuccessful. Please check username and password.");
			}
			if ($res['user'] != "suspend") {
                $this->aviauth->start_session(json_decode(json_encode($res), true));
                ajax_response(1, "Login successfully...",$res);
            } elseif($res['user'] == "suspend"){
                ajax_response(0, "User is suspended!");
            }else{
                ajax_response(0, "Login unsuccessful. Please check username and password.");
            }
        }
			
		// if ($this->aviauth->ip_login_attempts_exceeded()){
		// 	$this->data['captcha'] = $this->aviauth->recaptcha(FALSE);
		// }
				
		// Get any status message that may have been set.
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];		
		// $this->data['asset_manifest'] = 'auth.ini';
		$this->load->view('auth/login_view', $this->data);
	}
	
	function register_retailer()
    {	
		// If 'Login' form has been submited, attempt to log the user in.

		if ($this->input->post()) {
            $this->load->model("auth_model");
			$name = $this->input->post("name");
			$salesman_id = $this->input->post("salesman_id");
			$distributor_id = $this->input->post("distributor_id");
			$address = $this->input->post("address");
			$mobile = $this->input->post("mobile");
			$gstn = $this->input->post("gstn");
			$password = $this->input->post("password");
			if ($this->auth_model->register_retailer($name, $salesman_id, $distributor_id, $address, $mobile, $gstn, $password)) {
				ajax_response(1, "Retailer Registered successfully.");
			} else {
				ajax_response(0, "Phone no. already registered.");
			}
        }
			
		// Get any status message that may have been set.
		$this->data['message'] = (! isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];		
		$this->data['salesman_list'] = $this->retailer_model->get_salesman_list();
		$this->data['distributor_list'] = $this->retailer_model->get_distributor_list();
		$this->load->view('auth/signup_view', $this->data);
	}
	

	/**
	 * logout
	 * This function logs the user out of all sessions on all computers they may be logged into.
	 */
	function logout() 
	{
		// By setting the logout functions argument as 'TRUE', all browser sessions are logged out.
		$this->aviauth->logout(TRUE);
		
		// Set a message to the CI flashdata so that it is available after the page redirect.
		$this->session->set_flashdata('message', "You're successfully logout.");		
 
		redirect('auth');
    }

	public function email_available($email = FALSE)
	{
	    if (empty($email))
	    {
			return FALSE;
        }
        $query = $this->db->get_where('user', ['email' =>$email]);
        return $query->row();
    }

	public function phone_available($phone = FALSE)
	{
	    if (empty($phone))
	    {
			return FALSE;
        }
        $query = $this->db->get_where('user', ['phone' =>$phone]);
        return $query->row();
    }

	public function reset_password()
    {
        $this->data['email'] = "lalitvyas271@gmail.com";
        $this->load->model("auth_model");
        // $this->data['page'] = $this->common_model->get_page();
        
        $this->data['asset_manifest'] = 'auth.ini';
        $this->load->view('auth/reset_password_view', $this->data);
    }

     //change password function
    public function change_password()
    {
        $mobile = $this->input->post("mobile");
        $password = $this->input->post("password");
        $this->db->where('phone', $mobile);
        $row_update = $this->db->update("user", [
            "password" => password_hash($password, PASSWORD_DEFAULT),
        ]);
        if ($row_update) {
            ajax_response(1, "Password changes successfully");
        } else {
            ajax_response(0, "failed to change password.");
        }
    }

	// public function sendOtp()
    // {
    //     $this->load->library("acapediaapi");
    //     $mobile = $this->input->post("mobile");
	// 	$otp = sprintf("%06d", mt_rand(1, 999999));
    //     $uri = "https://sms.smsmenow.in/sendsms.jsp";
	// 	$data = [
	// 		"user"=>"jkspice",
	// 		"password"=>"1aef588899XX",
	// 		"senderid"=>"JKSPIC",
	// 		"mobiles"=>$mobile,
	// 		"sms"=> $otp,
	// 	];
    //     $response = $this->acapediaapi->call($uri, 'get', $data);
	// 	prd($response);
    //     // echo json_encode($response);
    // }

	public function sendOtp()
    {
		$mobile = $this->input->post("mobile");
		$phone = $this->phone_available($mobile);
		if(!$phone){
			ajax_response(0, "Mobile No. does not exists.");
		}
		
		$request_id = $this->generateRandomString(10);
       
		$otp = sprintf("%06d", mt_rand(1, 999999));
		// send_sms_notification($mobile, $otp);

		$data = array(
			'request_id'      => $request_id,
			'mobile'		  => $mobile,
			'otp'             => $otp,
			'expiry' 		  => date('Y-m-d h:i:s', strtotime('+2 minutes'))
		);

		if ($this->auth_model->save_otp($data)) {
			$response = array(
				'request_id' => $request_id,
				'mobile' => $mobile
			);
			ajax_response(1, "OTP sent successfully.", $response);
		} else {
			ajax_response(0, "OTP send failed.");
		}
	
    }

    public function verifyOtp()
    {
        $otp = $this->input->post("otp");
        $request_id = $this->input->post("request_id");
        $mobile = $this->input->post("mobile");
        
        $response = $this->auth_model->verify_otp($otp, $request_id, $mobile);
		if ($response == "1") {
			ajax_response(1, "OTP verify successfully.", $response);
		} else if($response == "2"){
			ajax_response(2, "OTP Expired!");
		}else{
			ajax_response(0, "Invalid OTP!");
		}

    }

	private function generateRandomString($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[mt_rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function send_mail() {

		// $config = [
		// 	'protocol'=>'smtp',
		// 	'smtp_host'=>'smtp.googlemail.com',
		// 	// 'mailpath'=>'/usr/sbin/sendmail',
		// 	'smtp_port'=>465,
		// 	'smtp_timeout'=>30,
		// 	'smtp_user'=>'lalitvyas271@gmail.com',
		// 	'smtp_pass'=>'rlzcycafrwrnwqqc',
		// 	'charset'=>'iso-8859-1',
		// 	// 'validate'=>true,
		// 	'mailtype'=>'html',
		// 	'newline'=>'\r\n',
		// 	'crlf'=>'\r\n',
		// ];
		// $this->load->library('email'); 

		// $from_email = "lalitvyas271@gmail.com";
		// $to_email = $this->input->post('email'); 
		// $mail = $this->email_available($to_email);
        // if(!$mail){
        //     ajax_response(0, "Email not found");
        // } 
  		// $url = BASE_URL."reset-password";
		
		 
		// $this->email->initialize($config);
		// $this->email->set_newline('\r\n');
		// $this->email->from($from_email, 'php'); 
		// $this->email->to($to_email);
		// $this->email->subject('reset email'); 
		// $this->email->message($url); 
  
		$this->load->library('email'); 
		$verifyLink = BASE_URL . 'verify?code=';
            		$config = array();
					$config['protocol'] = 'sendmail';
					$config['mailpath'] = '/usr/sbin/sendmail';
					$config['charset'] 	= 'iso-8859-1';
					$config['mailtype'] = 'html';
	        		$config['newline'] 	= "\r\n";
					$config['wordwrap'] = TRUE;
					$this->email->initialize($config);
					$message1 = '';
					$subject = "Welcome to Motodealers";
	                $this->email->from('lalitvyas271@gmail.com', "LALIT");
	                $this->email->reply_to('lalitvyas271@gmail.com', "LALIT");
					$this->email->to('lalitvyas271@gmail.com'); 
					$this->email->subject($subject);
					$message1 = '<table style="width:100%;padding: 0px;color:#333; opacity:.9; font-size: 18px; font-weight: normal; ">';
					$message1 .= '<tr><td colspan="2"><b>Hello, </b></td></tr>';
					$message1 .= '<tr><td colspan="2"><b>Thank you for joining us. This is a verification email. To process further, you need to verify your email id. Please verify using below:</b></td></tr>';
	            	$message1 .= '<tr><td colspan="2"><b><a href="' . $verifyLink . '">Click Here</a> to verify your Email ID."</b></td></tr>';
	            	$message1 .= '<tr><td colspan="2"><hr /></td></tr><tr><td colspan="2"><br /><b>Thanks & Regards</b></td></tr>';
	            	$message1 .= '<tr><td colspan="2"><img style="width:150px" src="' .BASE_URL. 'assets/images/imageedit_1_7838890057.png' . '" /></td></tr>';
	            	$message1 .='</table>';
					$this->email->message($message1);
		//Send mail 
		if(!$this->email->send()){
			
			//prd($this->email->send());
			ajax_response(0, $this->email->print_debugger() );
		}else{
			ajax_response(1, "Email send successfully");
		}
		
	 } 
	
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */
