<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aviauth{
    public function __construct() {
        $this->ci = & get_instance();
    }

    function is_logged_in() {
        return $this->ci->session->userdata("is_loadded_in");
    }

    function ip_login_attempts_exceeded() {
        return false;
    }

    function start_session($data){
        $this->ci->session->set_userdata("is_loadded_in", TRUE);
        $data["refreshToken"] = "";
        $this->ci->session->set_userdata("auth", $data);
    }

    function update_session($data){
        $this->ci->session->set_userdata("auth", $data);
    }

    function logout(){
        $this->ci->session->set_userdata("is_loadded_in", FALSE);
        $this->ci->session->set_userdata("auth", []);
    }
}
