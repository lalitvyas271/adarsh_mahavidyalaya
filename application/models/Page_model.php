<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_pages($slug = false){
        $q = $this->db->get_where("pages", ["slug" => $slug]);
        return $q->row();
    }

    function get_page($id = false){
        $q = $this->db->get_where("pages", ["id" => $id]);
        return $q->row();
    }

    function update_page($id, $content){
        $this->db->where("id", $id);
        $this->db->update("pages", ["content" => $content]);
        return $this->db->affected_rows();
    }
}