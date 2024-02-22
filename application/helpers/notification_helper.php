<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @param $mobile
 * @param $body
 * @param bool $is_promotional
 */
function send_sms_notification($mobile, $otp)
{

    $url = "https://sms.smsmenow.in/sendsms.jsp?";

	$post_data = 'user=jkspice';
	$post_data .= '&password=1aef588899XX';
	$post_data .= '&senderid=JKSPIC';
	$post_data .= '&mobiles=' . $mobile;
	$post_data .= '&sms=' . $otp;


	$get_url = $url . $post_data . BASE_OTP_STRING;
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $get_url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_SSL_VERIFYHOST => 0,
		CURLOPT_SSL_VERIFYPEER => 0,
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);


	if ($err) {
		//echo "cURL Error #:" . $err;
	} else {
		//echo $response;
	}
}
