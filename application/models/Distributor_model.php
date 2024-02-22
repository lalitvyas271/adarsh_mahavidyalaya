<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
// Creation Date 			: Sept 26, 2023
// Developer 				: Lalit Vyas
// Model					: Distributor_model
// Purpose 					: Model to perform user related operations in database
// Input parameters         : Specific for each function
// Output parameters        : Specific for each function
// Last modified 			: 16 Oct, 2023
*/ 
class Distributor_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_asm_list(){
        $this->db->select("u.id, up.screen_name");
        $this->db->from("user u");
        $this->db->join("user_profile up", "u.id = up.user_id", "left");
        $this->db->join("user_roles ur", "u.role_id = ur.id", "left");
        $this->db->where(["u.is_deleted"=>0, "u.is_active"=>1, "role_id"=>1]);
        $query = $this->db->get();
        return $query->result();     
    }

    public function get_distributor_list(){
        $this->db->select("u.id, up.screen_name");
        $this->db->from("user u");
        $this->db->join("user_profile up", "u.id = up.user_id", "left");
        $this->db->join("user_roles ur", "u.role_id = ur.id", "left");
        $this->db->where(["u.is_deleted"=>0, "u.is_active"=>1, "u.role_id"=> 2]);
        $query = $this->db->get();
        return $query->result(); 
    }

    public function get_distributor(){
        $distributors = array();
        $this->db->select("u.id, u.is_active, um.user_mapped_id asm_id, up.screen_name distributor_name, up.gstn, up.phone, up.gstn");
        $this->db->from("user u");
        $this->db->join("user_profile up", "u.id = up.user_id", "left");
        $this->db->join("user_mapping um", "um.user_id = u.id", "left");
        $this->db->where(["u.is_deleted"=>0, "role_id"=>2]);
        $query = $this->db->get();
        $distributor =  $query->result();
        foreach ($distributor as $d) {
            $this->db->select("up.screen_name asm_name");
            $this->db->from("user_profile up");
            $this->db->where("up.user_id", $d->asm_id);
            $query = $this->db->get();
            $asm =  $query->row();

            $distributors[] = array(
                'id' => $d->id,
                'asm_id'=>$d->asm_id,
                'distributor_name' => $d->distributor_name,
                'phone' => $d->phone,
                'gstn' => $d->gstn,
                'is_active' => $d->is_active,
                'asm_name'=> $asm->asm_name
            );
            
        }
        return $distributors; 
    }

    public function get_destributor_details($id = false){
        $this->db->select("u.id, u.is_active, um.user_mapped_id asm_id, up.screen_name distributor_name, up.gstn, up.phone, up.gstn, up.full_address");
        $this->db->from("user u");
        $this->db->join("user_profile up", "u.id = up.user_id", "right");
        $this->db->join("user_mapping um", "um.user_id = u.id", "left");
        $this->db->where("u.id", $id);
        $query = $this->db->get();
        $distributor=  $query->row();

            $this->db->select("up.screen_name asm_name");
            $this->db->from("user_profile up");
            $this->db->where("up.user_id", $distributor->asm_id);
            $query = $this->db->get();
            $asm =  $query->row();
            
            $distributors = array(
                'id' => $distributor->id,
                'asm_id'=>$distributor->asm_id,
                'distributor_name' => $distributor->distributor_name,
                'phone' => $distributor->phone,
                'full_address' => $distributor->full_address,
                'gstn' => $distributor->gstn,
                'is_active' => $distributor->is_active,
                'asm_name'=> $asm->asm_name
            );

            return $distributors;
    }

    function is_active($id, $is_active){
        $active = $is_active == 0?1:0; 
        $this->db->where("id", $id);
        
        $this->db->update("user", ["is_active" => $active]);
        return $this->db->affected_rows();
    }

    function save($name, $asm_id, $address, $mobile, $gstn, $password){
        $phone = $this->phone_available($mobile);
        if($phone){
            return false;
        }else{
            $this->db->insert("user", ["role_id" => 2, "username" => $mobile,"phone" => $mobile, "password" => password_hash($password, PASSWORD_DEFAULT)]);
            $user_id = $this->db->insert_id();
            $this->db->insert("user_profile", ["user_id" => $user_id, "screen_name" => $name, "gstn"=>$gstn, "full_address"=>$address, "phone"=>$mobile]);
            $this->db->insert("user_mapping", ["user_id" => $user_id, "user_mapped_id" => $asm_id]);
            return true;
        }
    }

    public function phone_available($phone = FALSE)
	{
	    if (empty($phone))
	    {
			return FALSE;
        }
        $query = $this->db->get_where('user', ['phone' =>$phone]);
        return $query->row();
    }

    function update($id, $user_mapped_id, $name, $asm_id, $address, $gstn){
        $this->db->trans_start();
        
        $this->db->where("id", $id);
        $data = [
            
            "username" => $name
        ];
        $this->db->update("user", $data);

        $this->db->where("user_id", $id);
        $this->db->update("user_profile", [
            "screen_name" => $name,
            "gstn" => $gstn,
            "full_address" => $address,
            
        ]);

        $this->db->where("user_id", $id);
        $this->db->update("user_mapping", [
            "user_mapped_id" => $asm_id,
        ]);

        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    function update_password($id, $password){
        
        $this->db->where("id", $id);
        $data = [
            "password" => password_hash($password, PASSWORD_DEFAULT),      
        ];
        $this->db->update("user", $data);       
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    function ban_user($id, $status = 1){
        $this->db->where("id", $id);
        $this->db->update("user", ["is_suspend" => $status]);
        return $this->db->affected_rows();
    }

    //****************** Distributor Master ********************

    function get_distributor_asm($distributor_id){
        $this->db->select("up.user_id asm_id, up.screen_name asm_name");
        $this->db->from("user_mapping um");
        $this->db->join("user_profile up", "um.user_mapped_id = up.user_id", "inner");
        $this->db->where("um.user_id", $distributor_id);
        $query = $this->db->get();
        return $query->row();
    }

    function save_target($distributor_id, $asm_id, $distributor_name, $asm_name, $t1, $t2, $t3, $qt)
	{
        $data = array(
            'distributor_id' => $distributor_id,
            'asm_id' => $asm_id,
            'distributor_name'=>$distributor_name,
            'asm_name' => $asm_name,
            'month_t1' => $t1,
            'month_t2' => $t2,
            'month_t3' => $t3,
            'quarterly_target' => $qt, 
        );

        $this->db->insert('distributor_target', $data);
        $insert_id = $this->db->insert_id();

        $this->db->where('id',$insert_id);
        $this->db->update('distributor_target', ['target_id'=>'JKDT-'.$insert_id]);
        return true;
    }

    function update_target($id, $t1, $t2, $t3, $qt){
        $this->db->trans_start();
        
        $this->db->where("id", $id);
        $data = array(
            'month_t1' => $t1,
            'month_t2' => $t2,
            'month_t3' => $t3,
            'quarterly_target' => $qt, 
        );  
        $this->db->update("distributor_target", $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    function get_distributor_target_list(){
        $this->db->select("dt.*");
        $this->db->from("distributor_target dt");
        $this->db->where("dt.is_deleted", 0);
        $query = $this->db->get();
        return $query->result();    
    }

    function get_destributor_target_details($id = false){
        $this->db->select("dt.*");
        $this->db->from("distributor_target dt");
        $this->db->where("dt.id", $id);
        $query = $this->db->get();
        return $query->row();
    }

    function status_target($id, $status){
        $is_status = $status == 0?1:0; 
        $this->db->where("id", $id);
        $this->db->update("distributor_target", ["status" => $is_status]);
        return $this->db->affected_rows();
    }

    function is_deleted_dist_manager($id, $is_deleted){
        $deleted = $is_deleted == 0?1:0; 
        $this->db->where("id", $id);
        
        $this->db->update("distributor_target", ["is_deleted" => $deleted]);
        return $this->db->affected_rows();
    }


    //************ Distributor Target Saprate ***************
    function get_target_list(){
        $dist_id = $this->session->userdata("auth")["user"]["id"];
        $this->db->select("dt.*");
        $this->db->from("distributor_target dt");
        $this->db->where(["dt.status"=> 1,"dt.is_deleted"=> 0, "distributor_id"=>$dist_id]);
        $query = $this->db->get();
        return $query->result();    
    }

    function get_destributor_sales_log_list($id){
        $this->db->select("d.*");
        $this->db->from("distributor_target_sales_log d");
        $this->db->where("d.target_id",$id);
        $query = $this->db->get();
        return $query->result();    
    }

    function save_sales($target_id, $month_no, $monthly_target, $current_sale, $due_sale){
        $data = [
            "target_id"=>$target_id,
            "month_no"=>$month_no,
            "monthly_target"=>$monthly_target,
            "current_sale"=>$current_sale,
            "due_sale"=>$due_sale
        ];

        $months = [
            '1'=>'sale_of_monthly_t1',
            '2'=>'sale_of_monthly_t2',
            '3'=>'sale_of_monthly_t3'
        ];

        $this->db->insert("distributor_target_sales_log", $data);
        $insert_id = $this->db->insert_id();

        $this->db->where('id',$insert_id);
        $this->db->update('distributor_target_sales_log', ['log_id'=>'DTL-'.$insert_id]);
        
        $this->db->select("SUM(d.current_sale) as total_sale, due_sale");
        $this->db->from("distributor_target_sales_log d");
        $this->db->where(["d.target_id"=>$target_id, "month_no"=>$month_no, "monthly_target"=>$monthly_target]);
        $query = $this->db->get();
        $total =  $query->row();

        

        $this->db->where("id", $target_id);
        $this->db->update("distributor_target", [$months[$month_no] => $total->total_sale]);
        
        $this->db->select("SUM(sale_of_monthly_t1 + sale_of_monthly_t2 + sale_of_monthly_t3) as total");
        $this->db->from("distributor_target dt");
        $this->db->where(["dt.id"=>$target_id]);
        $query = $this->db->get();
        $total =  $query->row();

        $this->db->where("id", $target_id);
        $this->db->update("distributor_target", ["total_quarterly_sale" => $total->total]);

        //$query_str='update distributor_target SET total_quarterly_sale= (select SUM(sale_of_monthly_t1 + sale_of_monthly_t2 + sale_of_monthly_t3) as total from distributor_target) where id=?;';        
        //$this->db->query($query_str, $target_id);

        return true;
    }

}