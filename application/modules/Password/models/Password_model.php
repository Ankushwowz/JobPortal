<?phpclass Password_Model extends CI_Model{
	function ChangePassword(){		$UserData = $this->session->userdata('Session_data');		$user_ID = $UserData['id'];		$current_password = md5($this->input->post('current-password')); 		$password = md5($this->input->post('password')); 		$this->db->select('id,role,email');		$this->db->where('id', $user_ID);		$this->db->where('password', $current_password);        $result = $this->db->get('users');		if($result->num_rows() == 1) {			$data = array(						'password' => $password					);		 $this->db->where('id', $user_ID);		 $this->db->update('users', $data);		 return 1;		}else{			return 0;		}	}
}?>