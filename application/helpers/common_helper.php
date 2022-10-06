<?php
// Get User Info
function getUser(){
	//load databse library
   $ci =& get_instance();
   $ci->load->database();
	$UserData = $ci->session->userdata('Session_data');
	$user_ID = $UserData['id'];
	$ci->db->select('email,fullname,image,phoneNo,country,state,city,address,gender,tagline,description,user_availability,user_experience,categoryID,subcategoryID,hourly_rate,escrow_email,escrow_password,paypal_id,payment_mode,stripe_key,stripe_secret');
	$ci->db->where('id',$user_ID);
	$query = $ci->db->get('users');
	return $query->row_array();
}
// Get Language County
function getCounty(){
	$ci =& get_instance();
	$ci->load->database();
	$query = $ci->db->get('countries');
	return $query->result_array();
}
// Get Language State
function getState(){
	$ci =& get_instance();
	$ci->load->database();
	$countryId= $ci->input->post('country_id');
	if(!empty($countryId)){
		$query = $ci->db->where('country_id',$countryId)->get('states');
		$Result = $query->result_array();
		$html='<select name="state" id="state" class="form-control"><option value=""> Select State</option>';
		foreach($Result as $result){
		 $html .='<option  value="'.$result['id'].'">'.$result['name'].'</option>';	
		}
		$html .='</select>';
	}
	return $html;
}
// Get Language City
function getCity(){
	$ci =& get_instance();
	$ci->load->database();
	$state_id= $ci->input->post('state_id');
	if(!empty($state_id)){
		$query = $ci->db->where('state_id',$state_id)->get('cities');
		$Result = $query->result_array();
		$html='<select name="city" id="city" class="form-control"><option value=""> Select City</option>';
		foreach($Result as $result){
		 $html .='<option  value="'.$result['id'].'">'.$result['name'].'</option>';	
		}
		$html .='</select>';
	}
	return $html;
}
// Get Language level
function getLanguagelevel(){
	$ci =& get_instance();
    $ci->load->database();
	$query = $ci->db->get('language_level');
	return $query->result_array();
}
// Get Language
function getLanguage(){
	$ci =& get_instance();
    $ci->load->database();
	$keyword= $ci->input->post('query');
	$where ="language_name LIKE '%$keyword%'";
	$query = $ci->db->where($where)->get('language');
	$NumRow=  $query->num_rows();
	if($NumRow >0){
	   $result = $query->result_array();
	}else{
		 $error[0]['language_id'] = '0';
		 $error[0]['language_name'] = 'Not found';
		 $result = $error;
	}
	return $result;
	
}

// Get Experience level
function getExperience(){
	$ci =& get_instance();
    $ci->load->database();
	$query = $ci->db->get('skills_level');
	return $query->result_array();
}
// Get Skills
function getSkill(){
	$ci =& get_instance();
    $ci->load->database();
	$keyword= $ci->input->post('query');
	$where ="skill_name LIKE '%$keyword%'";
	$query = $ci->db->where($where)->get('skills');
	$NumRow=  $query->num_rows();
	if($NumRow >0){
	   $result = $query->result_array();
	}else{
		 $error[0]['skill_id'] = '0';
		 $error[0]['skill_name'] = 'Not found';
		 $result = $error;
	}
	return $result;
}


// Get Category
function getCategory(){
	$ci =& get_instance();
	$ci->load->database();
	$query = $ci->db->get('category');
	return $query->result_array();
}



// Get SubCategory
function getSubCategory(){
	$ci =& get_instance();
	$ci->load->database();
	$category_id= $ci->input->post('category_id');
	if(!empty($category_id)){
		$query = $ci->db->where('category_id',$category_id)->get('subcategory');
		$Result = $query->result_array();
		$html='<select name="subcategory" id="subcategory" class="form-control"><option value=""> Select Subcategory</option>';
		foreach($Result as $result){
		 $html .='<option  value="'.$result['subcategory_id'].'">'.$result['subcategory_name'].'</option>';	
		}
		$html .='</select>';
	}
	return $html;
}
// Get jobType
function jobType(){
	$ci =& get_instance();
	$ci->load->database();
	$query = $ci->db->get('job_type');
	return $query->result_array();
}

// Get Employers
function employerCount(){
	$ci =& get_instance();
	$ci->load->database();
	$query = $ci->db->where('role',2)->get('users');
	return $query->num_rows();
}
// Get Candidates
function candidateCount(){
	$ci =& get_instance();
	$ci->load->database();
	$query = $ci->db->where('role',1)->get('users');
	return $query->num_rows();
}

//Admin Info

function getAdmin(){
	//load databse library
	   $ci =& get_instance();
	   $ci->load->database();
		$ci->db->select('email,fullname,image,phoneNo,country,state,city,address,gender,tagline,description,user_availability,user_experience,categoryID,subcategoryID,hourly_rate,escrow_email,escrow_password');
		$ci->db->where('role','3');
		$query = $ci->db->get('users');
		return $query->row_array();
}
?>