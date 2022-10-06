<?php
   class Login_model extends CI_Model{
   
       function login_user(){
		$encrypt_password = md5($this->input->post('password')); 
		$this->db->select('id,role,email,status');
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('password', $encrypt_password);
		$result = $this->db->get('users');
		if ($result->num_rows() == 1) {
			$userData = $result->row_array();
			if($userData['status']=='A'){
				$role_array = array('1','2');
			if(in_array($userData['role'],$role_array) ) { 
			
			$data = array(
               "lastloginstatus" =>1,
               "lastlogindate" =>date('Y-m-d')
               );
               $this->db->where('id', $userData['id']);
               $this->db->update('users', $data);
				$Session_data = array(
						"id" =>$userData['id'],
						"role" =>$userData['role'],
						"email" =>$userData['email']
				);
   
				$this->session->set_userdata('Session_data',$Session_data);		
				return 1;
			}else{
			return 2;	
			}

			}else{
				return 3;	
				
			}
			
			
        }
		else{
   
   			return 0;
   
   		}	
   
   	}
   
    function forgot_password($pass){
		
		$this->db->select('id,role,email');
		$this->db->where('email', $this->input->post('email'));
		$result = $this->db->get('users');
		if ($result->num_rows() == 1) {
			$userData = $result->row_array();
			$role_array = array('1','2');
			if(in_array($userData['role'],$role_array) ) { 
				$data =array(
					'password' =>$pass
				);
				$this->db->where('email', $this->input->post('email'));
				$this->db->update('users', $data);
				return 1;
			}else{
			return 2;	
			}
        }else{
   
   			return 0;
   
   		}	
   
   	}


  }
   
   
   
   ?>