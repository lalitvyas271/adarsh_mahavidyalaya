<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Common_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function save_contact_details()
    {
        $data = [
            "name" => $this->input->post("name"),
            "email" => $this->input->post("email"),
            "ip"=>  $_SERVER['REMOTE_ADDR'],
            "mobile" => $this->input->post("mobile"),
            "comment" => $this->input->post("message"),
        ];
        $this->db->insert("web_contact_enquires", $data);    
        return $this->db->insert_id();
    }

    public function get_banners()
    {
	    $this->db->where("is_active", 1);
    	$q = $this->db->get("banners");
        return $q->result();
    }

    public function get_news()
    {
	    $this->db->where("is_active", 1);
    	$q = $this->db->get("news");
        return $q->result();
    }

    public function get_events()
    {
	    $this->db->where("is_active", 1);
    	$q = $this->db->get("events");
        return $q->result();
    }

    public function get_testimonial()
    {
	    $this->db->where("is_public", 1);
    	$q = $this->db->get("testimonial");
        return $q->result();
    }

    public function get_page()
    {
        $this->db->where("is_active", 1);
        $query = $this->db->get("page");
        return $query->result();
    }

    public function get_page_data_by_slug($pageslug)
    {
        $this->db->select("content");
        $this->db->where("slug", $pageslug);
        $query = $this->db->get("page");
        return $query->row();
    }
}