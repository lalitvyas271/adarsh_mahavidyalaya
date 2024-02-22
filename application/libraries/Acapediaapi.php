<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Acapediaapi
{

    public $param;
    private $_api_endpoint = ENVIRONMENT === 'development' ? "https://sms.smsmenow.in/" : "https://sms.smsmenow.in/";
    private $_index;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->library("rest");
    }

        private function _prepare_request()
        {
                $this->ci->rest->initialize([
                        'server' => $this->_api_endpoint
                ]);
                // if (isset($this->ci->session->userdata('auth')['token'])) {
                //         $this->ci->rest->header('x-auth-token:' . $this->ci->session->userdata('auth')['token']);
                //         $this->ci->rest->header('refreshToken:' . $this->ci->session->userdata('auth')['refreshToken']);
                // }
        }

        function call($uri, $method, $params = [])
        {
                $this->_prepare_request();
                if ($method == 'post') {
                        $res = $this->ci->rest->post($uri, $params);
                } else if ($method == 'put') {
                        $res = $this->ci->rest->put($uri, $params);
                } else if ($method == 'delete') {
                        $res = $this->ci->rest->delete($uri, $params);
                } else {
                        $res = $this->ci->rest->get($uri, $params);
                }
                if (is_object($res)) {
                        return $res;
                } else {
                        return false;
                        //prd($this->ci->rest->debug());
                }
        }

        function get_result_array($res)
        {
                return json_decode(json_encode($res), TRUE);
        }

        function debug()
        {
                echo $this->ci->curl->debug();
        }
}
