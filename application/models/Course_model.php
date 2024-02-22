<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
// Creation Date 			: Sept 26, 2023
// Developer 				: Lalit Vyas
// Model					: Asm_model
// Purpose 					: Model to perform user related operations in database
// Input parameters         : Specific for each function
// Output parameters        : Specific for each function
// Last modified 			: 16 Oct, 2023
*/ 
class Course_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_course(){
        $this->db->select("c.*");
        $this->db->from("course c");
        // $this->db->where(["u.is_deleted"=>0, "u.is_active"=>1, "role_id"=>1]);
        $query = $this->db->get();
        return $query->result();   
    }

    public function get_course_detail($id){
        $this->db->select("c.*");
        $this->db->from("course c");
        $this->db->where("c.id", $id);
        $query = $this->db->get();
        return $query->row(); 
    }

    public function get_retated_course_detail($id){
        $this->db->select("c.*");
        $this->db->from("course c");
        $this->db->where_not_in("c.id", $id);
        $query = $this->db->get();
        return $query->result(); 
    }

}