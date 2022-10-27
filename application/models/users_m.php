<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');


class users_m extends CI_Model {
  function __construct(){
      
      $this->load->database();
      
    }



 

 function login($user_name, $password) {
    return $this->db
    //->join("departments","users.dep_id = departments.dep_id","left")
   // ->join("municipalities","users.mun_id = municipalities.mun_id","left")
    ->get_where("users",array("users.user_name"=> $user_name, "users.password" => $password))->row();
 }

  




  function getUser_id($user_name, $password)
 {
   $this->db->select('user_id');
   $this->db-> from('users');
   $this->db->where('user_name', $user_name);
   $this->db->where('password', $password);
   $this->db->limit(1);
 
   $query = $this->db-> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

 /*function get_dep_id($user_name, $password)
 {
   $this->db->select('dep_id');
   $this->db-> from('users');
   $this->db->where('user_name', $user_name);
   $this->db->where('password', $password);
   $this->db->limit(1);
 
   $query = $this->db-> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }*/


 
 









 }
?>
