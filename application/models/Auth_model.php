<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Auth_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function username_available($username = FALSE)
	{
	    if (empty($username))
	    {
			return FALSE;
        }
        $query = $this->db->get_where('user', ['username' =>$username]);
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
		//return $this->db->where('phone', $phone)->count_all_results('user');
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

    public function login($username, $password)
    {
        $q = $this->db->get_where("user", ["phone" => $username, "is_active"=>1, "is_suspend"=>0]);
        $r = $q->row();
        if (!$r) {
            return false;
        }
        $hash = $r->password;

        if (password_verify($password, $hash)) {
            $user = [
                'user' => $r,
            ];
            $this->db->where("user_id", $r->id);
            $q1 = $this->db->get("user_profile");
            $d1 = $q1->row();
            $user["profile"] = $d1;

            // $this->db->select("ur.role_name");
            // $this->db->where("ur.user_id", $r->id);
            // $q2 = $this->db->get("user_roles ur");
            // $d2 = $q2->row();
            // $user["role"] = $d2;
            return $user;

        } else {
            return false;
        }
    }

    function register_retailer($name, $salesman_id, $distributor_id, $address, $mobile, $gstn, $password){
        $phone = $this->phone_available($mobile);
        if($phone){
            return false;
        }else{
            $this->db->insert("user", ["role_id" => 4, "username" => $mobile,"phone" => $mobile, "password" => password_hash($password, PASSWORD_DEFAULT)]);
            $user_id = $this->db->insert_id();
            $this->db->insert("user_profile", ["user_id" => $user_id, "screen_name" => $name, "gstn"=>$gstn, "full_address"=>$address, "phone"=>$mobile]);
            $this->db->insert("retailer_user_mapping", ["user_id" => $user_id, "distributor_id" => $distributor_id, 'salesman_id'=>$salesman_id]);
    
            return true;
        }
    }

    function save_otp($data)
	{
		return $this->db->insert("otps", $data);
	}

    function verify_otp($input_otp, $request_id, $mobile){
        $datetime = date('Y-m-d h:i:s');

		$this->db->select('otp, expiry');
		$this->db->from('otps');
		$this->db->where(['request_id'=> $request_id, 'mobile'=>$mobile]);

		$otp_data = $this->db->get()->row();

		if ($otp_data) {

			$otp_expiry = $otp_data->expiry;

			$otp = $otp_data->otp;
            if ($otp_expiry >= $datetime) {
                if ($otp && $otp === $input_otp) {
                    $this->db->where(['request_id', $request_id, 'mobile'=>$mobile]);
                    $this->db->delete("otps");
    
                    return true;
                } else {
                    return false;
                }

			}else{
				return 2;
			}	
		} else {
			return false;
		}
    }

    // public function register($data)
    // {
    //     $this->db->trans_start();
    //     $this->db->insert("user", [
    //         "role_id" => $data["role_id"],
    //         "username" => $data["username"],
    //         "email" => $data["email"],
    //         "phone" => $data["phone"],
    //         "password" => password_hash($data["password"], PASSWORD_DEFAULT),
    //     ]);
    //     $id = $this->db->insert_id();
    //     $names = $this->split_name($data["name"]);
    //     $this->db->insert("user_profile", [
    //         "user_id" => $id,
    //         "screen_name" => $data["name"],
    //         "fname" => $names[0],
    //         "lname" => $names[1],
    //     ]);
    //     if($data["role_id"] == 2){
    //         $slug = url_title($data["username"].' '.$names[0], 'dash', true);
    //         $this->db->insert("coach", [
    //             "user_id" => $id,
    //             "uid" => $data["username"],
    //             "slug" => $slug
    //         ]);
    //         $coach_id = $this->db->insert_id();
    //         $this->db->insert("coach_bank_detail", [
    //             "coach_id" => $coach_id
    //         ]);
    //         $this->db->insert("user_wallet", [
    //             "user_id" => $id,
    //             "wallet_code" => WALLET_CODE.$id,
    //             "withdraw_limit"=> WITHRAW_LIMIT
    //         ]);
    //         $this->db->insert("user_social_media", [
    //             "user_id" => $id
    //         ]);
    //     }else{
    //         $this->db->insert("student", [
    //             "user_id" => $id
    //         ]);
    //         $this->db->insert("user_wallet", [
    //             "user_id" => $id,
    //             "wallet_code" => WALLET_CODE.$id,
    //             "withdraw_limit"=> WITHRAW_LIMIT
    //         ]);
    //         $this->db->insert("user_social_media", [
    //             "user_id" => $id
    //         ]);
    //     }
        
    //     $this->db->trans_complete();
    //     return $this->db->trans_status();
    // }

    // uses regex that accepts any word character or hyphen in last name
    function split_name($name) {
        $name = trim($name);
        $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $first_name = trim( preg_replace('#'.preg_quote($last_name,'#').'#', '', $name ) );
        return array($first_name, $last_name);
    }

    function update_is_online($user_id, $is_online){
        $this->db->trans_start();
        $this->db->where('user_id', $user_id);
        $this->db->update('coach', ['is_online'=>$is_online]);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }


    public function sociallogin($email)
    {
        $q = $this->db->get_where("user", ["email" => $email]);
        $r = $q->row();
        if ($r) {
            $this->db->where("user_id", $r->id);
            $q1 = $this->db->get("user_profile");
            $d1 = $q1->row();
            $user["profile"] = $d1;

            $this->db->select("urm.id, ur.role_name");
            $this->db->where("urm.user_id", $r->id);
            $this->db->join("user_roles ur", "ur.id = urm.role_id", "left");
            $q2 = $this->db->get("user_role_mapping urm");
            $d2 = $q2->row();
            $user["role"] = $d2;
            return $user;
        } else {
            return false;
        }
    }

}