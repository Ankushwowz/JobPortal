<?php

class Signup_model extends CI_Model{

	function create(){

		$userData = array(

		'email' => $this->input->post('email'), 

		'fullname' => $this->input->post('fullname'), 

		'role' => $this->input->post('role'), 

		'password' => md5($this->input->post('password')), 

		'created_at' => date("Y-m-d H:i:s")

		);

	$this->db->insert('users', $userData);
		return $this->db->insert_id();	

	}

	

	

}



?>