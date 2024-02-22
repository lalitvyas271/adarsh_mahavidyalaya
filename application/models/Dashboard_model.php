<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
// Creation Date 			: Sept 26, 2023
// Developer 				: Lalit Vyas
// Model					: Dashboard_model
// Purpose 					: Model to perform user related operations in database
// Input parameters         : Specific for each function
// Output parameters        : Specific for each function
// Last modified 			: 16 Oct, 2023
*/ 
class Dashboard_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_asm_total() {
        $this->db->select("u.*");
        $this->db->from("user u");
        // $this->db->join("user_profile up", "u.id = up.user_id", "left");
        $this->db->where(["u.is_deleted"=>0, "u.is_active"=>1, "u.role_id"=>1]);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_distributor_total() {
        $this->db->select("u.*");
        $this->db->from("user u");
        // $this->db->join("user_profile up", "u.id = up.user_id", "left");
        $this->db->where(["u.is_deleted"=>0, "u.is_active"=>1, "u.role_id"=>2]);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_salesman_total() {
        $this->db->select("u.*");
        $this->db->from("user u");
        // $this->db->join("user_profile up", "u.id = up.user_id", "left");
        $this->db->where(["u.is_deleted"=>0, "u.is_active"=>1, "u.role_id"=>3]);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_retailer_total() {
        $this->db->select("u.*");
        $this->db->from("user u");
        // $this->db->join("user_profile up", "u.id = up.user_id", "left");
        $this->db->where(["u.is_deleted"=>0, "u.is_active"=>1, "u.role_id"=>4]);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_distributor_target_list(){
        $this->db->select("dt.*, up.gstn, up.phone");
        $this->db->from("distributor_target dt");
        $this->db->join("user_profile up", "dt.distributor_id = up.user_id", "left");
        $this->db->where("dt.is_deleted", 0);
        $this->db->order_by("dt.id", 'desc');
        $this->db->limit(5);  
        $query = $this->db->get();
        return $query->result();    
    }

    function get_bill_list(){
        $this->db->select("b.*, up.screen_name retailer_name, up.gstn, up.phone");
        $this->db->from("bills b");
        $this->db->join("user_profile up", "b.retailer_id = up.user_id", "left");
        $this->db->where("b.is_deleted", 0);
        $this->db->order_by("b.id", 'desc');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result();    
    }
}