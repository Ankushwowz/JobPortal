<?php
class Profile_Model extends CI_Model{

	function EditProfile(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$data = array(
						'fullname' => $this->input->post('fullname'),
						'phoneNo' => $this->input->post('phoneNo'),
						'gender' => $this->input->post('gender'),
						'country' => $this->input->post('country'),
						'state' => $this->input->post('state'),
						'city' => $this->input->post('city'),
						'address' => $this->input->post('address'),
						'user_availability' => $this->input->post('user_availability'),
						'user_experience' => $this->input->post('user_experience'),
						'categoryID' => $this->input->post('category'),
						'subcategoryID' => $this->input->post('subcategory'),
						'hourly_rate' => $this->input->post('hourly_rate')
						
					);
		 $this->db->where('id', $user_ID);
		return  $this->db->update('users', $data);
	}
	function uploadUserImage($image){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$data = array( 'image' => $image);
		 $this->db->where('id', $user_ID);
		 $result = $this->db->update('users', $data);
		 if($result){
			 $imageurl=base_url()."assets/img/profileimage/".$image;
			 $html='<img  src="'.$imageurl.'" alt="profile-photo" class="img-fluid userimage">';
		 }
		 return $html;
	}
	function ChangeTagline(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$data = array(
						'tagline' => $this->input->post('tagline'),
						'description' => $this->input->post('description')
					);
		 $this->db->where('id', $user_ID);
		return  $this->db->update('users', $data);
	}
	function addLanguage(){
		//Add New Language into Language Table
		if($this->input->post('languageId')==0){
			$language_name = ucfirst(strtolower($this->input->post('addLanguage')));
			$LanguageData = array( 'language_name' => $language_name );
			$this->db->insert('language', $LanguageData);
			$languagesId =  $this->db->insert_id();			
		}else{
			$languagesId = $this->input->post('languageId');
		}
		//End Here
	    $UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$languages_level_id = $this->input->post('LanguageLevelId');
		
		$data = array(
						'user_id' => $user_ID,
						'languageLevel_id' => $languages_level_id,
						'languageID' => $languagesId,
						'created_at' => date('Y-m-d')
					);
	$this->db->insert('user_language', $data);
	$this->db->select('user_language.user_language_id,language_level.language_name as languageLevelName ,language.*');
	$this->db->from('user_language');
	$this->db->join('language_level', 'language_level.languages_level_id = user_language.languageLevel_id');
	$this->db->join('language', 'language.language_id = user_language.languageID');
    $this->db->where('user_language.user_id', $user_ID);
	$query=$this->db->get();
	$result = $query->result_array();

	$html ='<div id="language-div"><ul class="items-list">';
	foreach($result as $result){
		$html .='<li id="lang_'.$result['user_language_id'].'"><span class="title">'.$result['language_name'].'</span> - <span class="sub-title">'.$result['languageLevelName'].'</span><span class="delete-lang delete-icon-btn"><i class="fa fa-trash delete-language" rel="'.$result['user_language_id'].'"></i></span></li>';
		
	}
	$html .='</ul></div>';
	return $html;
	}
	//Delete Language
	function deleteLanguage(){
		$languagesId = $this->input->post('languageID');
		$this->db->where('user_language_id', $languagesId);
		return $this->db->delete('user_language');
	}
	// Get User  Language
	function getUserLanguage(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$this->db->select('user_language.user_language_id,language_level.language_name as languageLevelName ,language.*');
		$this->db->from('user_language');
		$this->db->join('language_level', 'language_level.languages_level_id = user_language.languageLevel_id');
		$this->db->join('language', 'language.language_id = user_language.languageID');
		$this->db->where('user_language.user_id', $user_ID);
		$query=$this->db->get();
		return $result = $query->result_array();
	}
	//Add Skills
	function addSkills(){
		
		if($this->input->post('skillID')==0){
			$skill_name = ucfirst(strtolower($this->input->post('addSkill')));
			$skillData = array( 'skill_name' => $skill_name );
			$this->db->insert('skills', $skillData);
			$skillID =  $this->db->insert_id();			
		}else{
			$skillID = $this->input->post('skillID');
		}
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		
		$ExperienceLevel = $this->input->post('ExperienceLevel');
		$data = array(
						'user_id' => $user_ID,
						'skill_level_id' => $ExperienceLevel,
						'skill_id' => $skillID,
						'created_at' => date('Y-m-d')
					);
	$this->db->insert('user_skills', $data);
	$this->db->select('user_skills.user_skill_id,skills_level.skill_level_name as skilllevelName ,skills.*');
	$this->db->from('user_skills');
	$this->db->join('skills_level', 'skills_level.skill_level_id = user_skills.skill_level_id');
	$this->db->join('skills', 'skills.skill_id = user_skills.skill_id');
    $this->db->where('user_skills.user_id', $user_ID);
	$query=$this->db->get();
	$result = $query->result_array();

	$html ='<div id="skill-div"><ul class="items-list">';
	foreach($result as $result){
		$html .='<li id="skill_'.$result['user_skill_id'].'"><span class="title">'.$result['skill_name'].'</span> - <span class="sub-title">'.$result['skilllevelName'].'</span><span class="delete-lan delete-icon-btn"><i class="fa fa-trash delete-skill" rel="'.$result['user_skill_id'].'"></i></span></li>';
		
	}
	$html .='</ul></div>';
	return $html;
	}
	
	// Get User  Skills
	function getUserSkills(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$this->db->select('user_skills.user_skill_id,skills_level.skill_level_name as skilllevelName ,skills.*');
		$this->db->from('user_skills');
		$this->db->join('skills_level', 'skills_level.skill_level_id = user_skills.skill_level_id');
		$this->db->join('skills', 'skills.skill_id = user_skills.skill_id');
		$this->db->where('user_skills.user_id', $user_ID);
		$query=$this->db->get();
		return $result = $query->result_array();
	}
	//Delete Language
	function deleteskill(){
		$skillID = $this->input->post('skillID');
		$this->db->where('user_skill_id', $skillID);
		return $this->db->delete('user_skills');
	}
	//Add Education
	function addEducation(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$County = $this->input->post('CountyofCollege');
		$CollegeName = $this->input->post('CollegeName');
		$degree = $this->input->post('degree');
		$Yearofgraduation = $this->input->post('Yearofgraduation');
		$data = array(
						'user_id' => $user_ID,
						'country_id' => $County,
						'college_university' => $CollegeName,
						'degree' => $degree,
						'passing_year' => $Yearofgraduation,
						'created_at' => date('Y-m-d')
					);
	$this->db->insert('education', $data);
	$this->db->select('countries.name,education.*');
	$this->db->from('education');
	$this->db->join('countries', 'countries.id = education.country_id');
	$this->db->where('education.user_id', $user_ID);
	$query=$this->db->get();
	$result = $query->result_array();

	$html ='<div id="education-div"><ul class="items-list">';
foreach($result as $result){
		$html .='<li id="education_'.$result['education_id'].'"><span class="title">'.$result['degree'].'</span> - <span class="sub-title">'.$result['college_university'].'</span><span class="delete-edu delete-icon-btn"><i class="fa fa-trash delete-education" rel="'.$result['education_id'].'"></i></span><h6 class="sub-title">'.$result['name'].','.$result['passing_year'].'</h6></li>';
		
	}
	$html .='</ul></div>';
	return $html;
	}
	// Get User  Education
	function getUserEducation(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$this->db->select('countries.name,education.*');
		$this->db->from('education');
		$this->db->join('countries', 'countries.id = education.country_id');
		$this->db->where('education.user_id', $user_ID);
		$query=$this->db->get();
		$result = $query->result_array();
		return $result = $query->result_array();
	}
	//Delete Language
	function deleteEducation(){
		$educationID = $this->input->post('educationID');
		$this->db->where('education_id', $educationID);
		return $this->db->delete('education');
	}
		//Add Certificate
	function addCertificate(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$CertificateOrAward = $this->input->post('CertificateOrAward');
		$CertifiedFrom = $this->input->post('CertifiedFrom');
		$YearofCertified = $this->input->post('YearofCertified');
		$data = array(
						'user_id' => $user_ID,
						'certification_name' => $CertificateOrAward,
						'certification_from' => $CertifiedFrom,
						'certification_year' => $YearofCertified,
						'created_at' => date('Y-m-d')
					);
	$this->db->insert('certification', $data);
	$query = $this->db->where('user_id', $user_ID)->get('certification');
	$result = $query->result_array();

	$html ='<div id="certification-div"><ul class="items-list">';
	foreach($result as $result){
		$html .='<li id="certi_'.$result['certification_id'].'"><span class="title">'.$result['certification_name'].'</span> <span class="delete-certi delete-icon-btn"><i class="fa fa-trash delete-certification" rel="'.$result['certification_id'].'"></i></span><h6 class="sub-title">'.$result['certification_from'].','.$result['certification_year'].'</h6></li>';
		
	}
	$html .='</ul></div>';
	return $html;
	}
	// Get User  Certification(
	function getUserCertification(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$query = $this->db->where('user_id', $user_ID)->get('certification');
	    $result = $query->result_array();
		return $result = $query->result_array();
	}
	//Delete Certification
	function deleteCertification(){
		$certificationID = $this->input->post('certificationID');
		$this->db->where('certification_id', $certificationID);
		return $this->db->delete('certification');
	}
	// Get Degree
	function getDegree(){
		$query = $this->db->get('degree');
		return $result = $query->result_array();
	}
	function uploadPortfolio($PortfolioImage){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$data = array(
						'user_id' => $user_ID,
						'portfolio' => $PortfolioImage,
						'created_at' => date('Y-m-d')
					);
		 
		return  $this->db->insert('portfolio', $data);
	}
	// Get Portfolio
	function getUserPortfolio(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$query = $this->db->where('user_id',$user_ID)->get('portfolio');
		return $result = $query->result_array();
	}
	//Delete Portfolio
	function deletePortfolio(){
		$portfolioID = $this->input->post('portfolioID');
		$this->db->where('portfolio_id', $portfolioID);
		return $this->db->delete('portfolio');
	}
	
	//Escrow Setting
	function escrowSetting(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$data = array(
						'escrow_email' => $this->input->post('escrow-email'),
						'escrow_password' => $this->input->post('escrow-pass')
						
					);
		 $this->db->where('id', $user_ID);
		return  $this->db->update('users', $data);
	}
	
	function addPaymentMode(){
		$UserData = $this->session->userdata('Session_data');
		$user_ID = $UserData['id'];
		$data = array(
						
						'payment_mode' => $this->input->post('payment_mode'),
						'paypal_id' => $this->input->post('paypal_id'),
						'stripe_key' => $this->input->post('stripe_key'),
						'stripe_secret' => $this->input->post('stripe_secret')
					);
		 $this->db->where('id', $user_ID);
		return  $this->db->update('users', $data);
	}
	
	
}
?>