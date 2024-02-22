<?php

function ajax_response($s, $m, $d = array()) {
    header('Content-type: application/json');
    echo json_encode(array('status' => $s, 'msg' => $m, 'data' => $d));
    exit;
}

function pr($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function prd($data) {
    pr($data);
    die;
}

function prq() {
    $CI =& get_instance();
    echo $CI->db->last_query();
    die;
}

function show_date($timestamp = false) {
    if ($timestamp) {
        try {
            return date(DATE_FORMAT_PHP, $timestamp);
        } catch (Exception $e) {
            return 'Unable to show date!';
        }
    } else {
        return 'Unable to show date!';
    }
}

function user_id(){
    $CI = &get_instance();
    return $user_id = $CI->session->userdata()['auth']['userDetail']['userInfo']['id'];
}

function is_ajax_request() {
    return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') ? true : false;
}

function get_address($value, $type = 'address') {
    $loc_name = array();
    $url = "https://maps.googleapis.com/maps/api/geocode/json?" . trim($type) . "=" . urlencode(trim($value)) . "&sensor=false";
    $url_response = file_get_contents($url);
    $url = "https://maps.googleapis.com/maps/api/geocode/json?" . trim($type) . "=" . trim($value) . "&sensor=false";
    $jsn = json_decode($url_response);
    if ($jsn->status == 'OK') {
        $api_loc = $jsn->results[0]->address_components;
        foreach ($api_loc as $k => $v) {
            if ($v->types[0] == 'locality') {
                $loc_name[] = $v->long_name;
            } else if ($v->types[0] == 'administrative_area_level_1') {
                $loc_name[] = $v->short_name;
            } else if ($v->types[0] == 'postal_code') {
                $loc_name[] = $v->short_name;
            }
        }
        return array("location" => implode(', ', $loc_name),
            "latitude" => $jsn->results[0]->geometry->location->lat,
            "longitude" => $jsn->results[0]->geometry->location->lng
        );
    }
    return false;
}

function get_loader($type = '', $size = FALSE) {
    $loader = '<i class="fa fa-spin';
    switch ($type) {
        case 'spinner':
            $loader .= ' fa-spinner';
            break;
        default:
            $loader .= ' fa-spinner';
    }
    if ($size) {
        switch ($size) {
            case '2x':
                $loader .= ' fa-2x';
                break;
            case 'bg':
                $loader .= ' fa-bg';
                break;
        }
    }
    $loader .= '"></i>';
    return $loader;
}

function validate_phone_number($value) {
    $value = trim($value);
    $match = '/^\(?[0-9]{3}\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}$/';
    $replace = '/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/';
    $return = '($1) $2-$3';
    if (preg_match($match, $value)) {
        return TRUE;
    } else {
        return false;
    }
}

function validate_fax_number($value) {
    $value = trim($value);
    $match = '/^\(?[0-9]{3}\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}$/';
    $replace = '/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/';
    $return = '($1) $2-$3';
    if (preg_match($match, $value)) {
        return TRUE;
    } else {
        return false;
    }
}
