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
class Teacher_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_teacher(){
        $this->db->select("t.*");
        $this->db->from("teachers t");
        // $this->db->where(["u.is_deleted"=>0, "u.is_active"=>1, "role_id"=>1]);
        $query = $this->db->get();
        return $query->result();   
    }

}