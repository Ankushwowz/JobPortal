$(document).ready(function(){
	$('#myTable').DataTable(
	     {
  "ordering": false
}
         
	    );
	var base_url =$('#base_url').val();
$( "#signup_form" ).submit(function( event ){ 
    var proceed = true;
    //loop through each field and we simply change border color to red for invalid fields       
        $("#signup_form input[required=true],#signup_form select[required=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
                }
                //check invalid email
                var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
                if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                    $(this).css('border-color','red'); //change border color to red  
					$('#email-error').css('display','block');
					 proceed = false; //set do not proceed flag   
				}
				var pass =$('#password').val();
				var passC =$('#confirm_Password').val();
				if(pass!=passC){
					$('#confirm_Password').css('border-color','red'); //change border color to red 
					$('#passC-error').css('display','block');					
					 proceed = false;
				}	
        });
       if(proceed==true){}else{event.preventDefault();}
    });
	$("#email").keyup(function() { 
		$('#email-error').css('display','none'); 
		$('.email-error').css('display','none'); 
	});
	$("#confirm_Password").keyup(function() { 
		$('#passC-error').css('display','none'); 
	});
	$("#signup_form input[required=true]").keyup(function() { 
			$(this).css('border-color',''); 
	});

	$("#signup_form select[required=true]").change(function() { 
		$(this).css('border-color',''); 
	});
	
	//Login Validation
	$( "#login_form" ).submit(function( event ){ 
    var proceed = true;
    //loop through each field and we simply change border color to red for invalid fields       
        $("#login_form input[required=true],#login_form select[required=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
                }
                //check invalid email
                var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
                if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                    $(this).css('border-color','red'); //change border color to red  
					$('#email-error').css('display','block');
					 proceed = false; //set do not proceed flag   
				}
					
        });
       if(proceed==true){}else{event.preventDefault();}
    });
	$("#loginemail").keyup(function() { 
		$('#email-error').css('display','none'); 
	});
	$("#login_form input[required=true]").keyup(function() { 
			$(this).css('border-color',''); 
	});
	
	//Change Password//
	
	$( "#password_form" ).submit(function( event ){ 
    var proceed = true;
    //loop through each field and we simply change border color to red for invalid fields       
        $("#password_form input[required=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
                }
               
				var pass =$('#password').val();
				var passC =$('#confirm_Password').val();
				if(pass!=passC){
					$('#confirm_Password').css('border-color','red'); //change border color to red 
					$('#passC-error').css('display','block');					
					 proceed = false;
				}	
        });
       if(proceed==true){}else{event.preventDefault();}
    });
	
	$("#password_form input[required=true]").keyup(function() { 
			$(this).css('border-color',''); 
	});
	
	
	//Edit Profile //
	$( "#edit_profile_form" ).submit(function( event ){ 
    var proceed = true;
    //loop through each field and we simply change border color to red for invalid fields       
        $("#edit_profile_form input[required=true],#edit_profile_form select[required=true],#edit_profile_form textarea[required=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
                }
               
				var pass =$('#password').val();
				var passC =$('#confirm_Password').val();
				if(pass!=passC){
					$('#confirm_Password').css('border-color','red'); //change border color to red 
					$('#passC-error').css('display','block');					
					 proceed = false;
				}	
		
				
				
				
				
        });
       if(proceed==true){}else{event.preventDefault();}
    });
	
	$("#edit_profile_form input[required=true],#edit_profile_form textarea[required=true]").keyup(function() { 
			$(this).css('border-color',''); 
	});
	$("#edit_profile_form select[required=true]").change(function() { 
			$(this).css('border-color',''); 
	});
	
	//Tagline
	$( "#changetagline" ).submit(function( event ){ 
    var proceed = true;
    //loop through each field and we simply change border color to red for invalid fields       
        $("#changetagline input[required=true],#changetagline textarea[required=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
                }
               
					
        });
       if(proceed==true){}else{event.preventDefault();}
    });
	$("#changetagline").keyup(function() { 
		$(this).css('border-color',''); 
	});
	
	//Add Language
	$( "#addlanguage_form" ).submit(function( event ){ 
    var proceed = true;
       $("#addlanguage_form input[required=true],#addlanguage_form select[required=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
                }
        });
       if(proceed==true){
		var languageId = $('#languageID').val();
		var LanguageLevelId = $('#LanguageLevel').val();
		var addLanguage = $('#addLanguage').val();
		if(languageId != ''){
			H5_loading.show(); 
			$.ajax({
			 url:base_url+"profile/addLanguage",
				method:"POST",
				data:{languageId:languageId,LanguageLevelId:LanguageLevelId,addLanguage:addLanguage},
				success:function(data){
					H5_loading.hide();
					$( "#language-div" ).replaceWith(data);
					$('#addLanguage').val('');
					$('#LanguageLevel').val('');
					
				}
			});
		return false;
		}
	   }else{event.preventDefault();}
    });
	$("#addlanguage_form select[required=true]").change(function() { 
			$(this).css('border-color',''); 
	});
	
		//Add Skills
	$( "#skills_form" ).submit(function( event ){ 
    var proceed = true;
       $("#skills_form input[required=true],#skills_form select[required=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
                }
        });
       if(proceed==true){
		var skillID = $('#skillID').val();
		var ExperienceLevel = $('#ExperienceLevel').val();
		var addSkill = $('#addSkill').val();
		if(skillID != ''){
			H5_loading.show(); 
			$.ajax({
			 url:base_url+"profile/addSkills",
				method:"POST",
				data:{skillID:skillID,ExperienceLevel:ExperienceLevel,addSkill:addSkill},
				success:function(data){
					H5_loading.hide();
					$( "#skill-div" ).replaceWith(data);
					$('#addSkill').val('');
					$('#ExperienceLevel').val('');
				}
			});
		return false;
		}
	   }else{event.preventDefault();}
    });
	$("#skills_form select[required=true]").change(function() { 
			$(this).css('border-color',''); 
	});
	
	
	//Add Education
	$( "#education_form" ).submit(function( event ){ 
    var proceed = true;
       $("#education_form input[required=true],#education_form select[required=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
                }
        });
       if(proceed==true){
		var CountyofCollege = $('#CountyofCollege').val();
		var CollegeName = $('#CollegeName').val();
		var degree = $('#degree').val();
		var Yearofgraduation = $('#Yearofgraduation').val();
		if(CountyofCollege != ''){
			H5_loading.show(); 
			$.ajax({
			 url:base_url+"profile/addEducation",
				method:"POST",
				data:{CountyofCollege:CountyofCollege,CollegeName:CollegeName,degree:degree,Yearofgraduation:Yearofgraduation},
				success:function(data){
					H5_loading.hide();
					$( "#education-div" ).replaceWith(data);
					$('#CountyofCollege').val('');
					$('#CollegeName').val('');
					$('#degree').val('');
					$('#Yearofgraduation').val('');
					
				}
			});
		return false;
		}
	   }else{event.preventDefault();}
    });
	$("#education_form input[required=true],#education_form textarea[required=true]").keyup(function() { 
			$(this).css('border-color',''); 
	});
	$("#education_form select[required=true]").change(function() { 
			$(this).css('border-color',''); 
	});
	
	//Add Education
	$( "#certification_form" ).submit(function( event ){ 
    var proceed = true;
       $("#certification_form input[required=true],#certification_form select[required=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
                }
        });
       if(proceed==true){
		var CertificateOrAward = $('#CertificateOrAward').val();
		var CertifiedFrom = $('#CertifiedFrom').val();
		var YearofCertified = $('#YearofCertified').val();
		if(CertificateOrAward != ''){
			H5_loading.show(); 
			$.ajax({
			 url:base_url+"profile/addCertificate",
				method:"POST",
				data:{CertificateOrAward:CertificateOrAward,CertifiedFrom:CertifiedFrom,YearofCertified:YearofCertified},
				success:function(data){
					H5_loading.hide();
					$("#certification-div" ).replaceWith(data);
					$('#CertificateOrAward').val('');
					$('#CertifiedFrom').val('');
					$('#YearofCertified').val('');
					
				}
			});
		return false;
		}
	   }else{event.preventDefault();}
    });
	$("#certification_form input[required=true],#certification_form textarea[required=true]").keyup(function() { 
			$(this).css('border-color',''); 
	});
	$("#certification_form select[required=true]").change(function() { 
			$(this).css('border-color',''); 
	});
	
	
	
	//Edit Profile //
	$( "#job_post_form" ).submit(function( event ){ 
    var proceed = true;
    //loop through each field and we simply change border color to red for invalid fields       
        $("#job_post_form input[required=true],#job_post_form select[required=true],#job_post_form textarea[required=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
                }
               
				var skill_array =$('#skill_array').val();
				if(skill_array!=''){
					$('#addSkill').css('border-color',''); 
					$("#addSkill").removeAttr("required");
				}	
        });
       if(proceed==true){}else{event.preventDefault();}
    });
	
	$("#job_post_form input[required=true],#job_post_form textarea[required=true]").keyup(function() { 
			$(this).css('border-color',''); 
	});
	$("#job_post_form select[required=true]").change(function() { 
			$(this).css('border-color',''); 
	});
	
	
	$( "#addPortfolio" ).click(function(  ){ 
     var uploadPortfolio = $('#uploadPortfolio').val();
	 if(uploadPortfolio==''){
	   $('#uploadPortfolio').css('border-color','red');
	   return false;
	 }
    });
    
    
    $( ".common-search,#sortbysearch" ).change(function(){ 
	  H5_loading.show(); 
       $("#candidate-search-form").submit();
    });
	$( ".checkbox_Exp,.checkbox_job_type,.s-gender" ).click(function(){ 
		H5_loading.show(); 
	   $("#candidate-search-form").submit();
    });
	/*$( "#sortbysearch" ).change(function(){ 
	  H5_loading.show(); 
       $("#candidate-search-sort-form").submit();
    });*/
    
    
    $( ".search-gender" ).click(function(){ 
	H5_loading.show(); 
       $("#employer-search-form").submit();
    });
	$( "#sLocation,#sortbysearchemp" ).change(function(){ 
	  H5_loading.show(); 
       $("#employer-search-form").submit();
    });
	/*$( "#sortbysearchemp" ).change(function(){ 
	  H5_loading.show(); 
       $("#employer-search-sort-form").submit();
    });*/
	
	
	var skillArray =[];
	//Add Skills In Jobs
	$( "#addjobSkillBtn" ).click(function(){ 
	var addSkill = $('#addSkill').val();
	if(addSkill==''){
		  $('#addSkill').css('border-color','red');
		return false;
	}
	var skillID = $('#skillID').val();
	if(skillID != ''){
			H5_loading.show(); 
			$.ajax({
			 url:base_url+"job/addSkills",
				method:"POST",
				data:{skillID:skillID,addSkill:addSkill},
				success:function(Skilldata){
					H5_loading.hide();
					//alert(Skilldata);
					var obj = jQuery.parseJSON(Skilldata);
					skillArray.push(obj.skill_id);
					var html ='<li id="jobskill_'+obj.skill_id+'"><span class="title">'+obj.skill_name+'</span>\
									<span class="delete-icon-btn"><i class="fa fa-trash delete-job-skill" rel="'+obj.skill_id+'"></i></span></li>';
					 $("#skill-div-ul").append(html);
					 $("#addSkill").val('');
					 $("#skill_array").val(skillArray);
					 
					
				}
			});
		//return false;
		}
	  console.log(skillArray);
    });
	
	
	$('body').on('click', '.delete-job-skill', function() {
	
      var skillID =$(this).attr('rel');
		swal({
			 title: "Are you sure you want to delete this skill",
			  text: "",
			  icon: "warning",
			  buttons: [
				'No, cancel it!',
				'Yes, I am sure!'
			  ],
			  dangerMode: true,
        }).then(function(isConfirm) {
          if (isConfirm) {
            swal({
              title: 'Deleted!',
              text: 'Skill has been successfully deleted!',
              icon: 'success'
            }).then(function() {
				$('#jobskill_'+skillID).remove();
				H5_loading.show(); 
				var removeItem = skillID;
      
				skillArray = $.grep(skillArray, function(value) {
					H5_loading.hide(); 
				return value != removeItem;
				});
                $("#skill_array").val(skillArray);
			});
          } else {
            swal("Cancelled", "", "error");
          }
        });
           
        });
	
	
	
	$( "#editjobSkillBtn" ).click(function(){ 
		var addSkill = $('#addSkill').val();
		var jobid = $('#jobid').val();
		if(addSkill==''){
			  $('#addSkill').css('border-color','red');
			return false;
		}
	var skillID = $('#skillID').val();
	if(skillID != ''){
			H5_loading.show(); 
			$.ajax({
			 url:base_url+"job/editSkills",
				method:"POST",
				data:{skillID:skillID,addSkill:addSkill,jobid:jobid},
				success:function(Skilldata){
					H5_loading.hide();
					$( "#skill-div" ).replaceWith(Skilldata);
					$('#addSkill').val('');
					 
					
				}
			});
		//return false;
		}
	  console.log(skillArray);
    });
	
	$( ".job-cat-search,#jobsortby" ).change(function(){ 
	  H5_loading.show(); 
       $("#jobs-search-form").submit();
      
    });
	$( ".check-job-type" ).click(function(){ 
		H5_loading.show(); 
	   $("#jobs-search-form").submit();
    });
	/*$( "#jobsortby" ).change(function(){ 
	  H5_loading.show(); 
      
       $("#jobs-sort-search-form").submit();
    });*/
    
	//Apply Form Validation
	$( "#apply_job_form" ).submit(function( event ){ 
    var proceed = true;
    //loop through each field and we simply change border color to red for invalid fields       
        $("#apply_job_form input[required=true],#apply_job_form textarea[required=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
                }
                //check invalid email
         });
       if(proceed==true){}else{event.preventDefault();}
    });
	
	
	$( "#findJob" ).click(function(){
		var searchtxt = $('#search-txt').val();
		var find_home_job = $('#find_home_job').val();
		var url= base_url+find_home_job;
		if(searchtxt==''){
			 $('#search-txt').css('border-color','red'); 
			 $('#search-txt').css('border','2px solid #c13e3e'); 
			return false;
		}	 
		  H5_loading.show(); 
		  $('#find-job-form').attr('action',url); 
		  $("#find-job-form").submit();
		   
    });
	
	$( "#search-txt" ).keyup(function(){
		$('#search-txt').css('border',''); 
		return false;
    });
	
	
	//Invite Freeleancer
	$( "#sendInvitation" ).click(function(){
		var projectId = $('#projectId').val();
		if(projectId==''){
			$('#invite-error').show();
			return false;
		}
		var candidate_user_id = $('#candidate_user_id').val();
		H5_loading.show(); 
			$.ajax({
				url:base_url+"employer/sendInvitation",
				method:"POST",
				data:{projectId:projectId,candidate_user_id:candidate_user_id},
				success:function(response){
					H5_loading.hide();
					if(response==2){
						$('#inviteUsersuccess').modal('show');
						$('#inviteUser').modal('hide');
						$('#projectId').val('');
					}
					if(response==1){
						$('#alreadly-invite-project').show();
					}
					if(response==3){
						//$('#alreadly-invite-project').show();
					}
					
					
					
				}
			});
	});	
	
	$( "#projectId" ).change(function(){
	   $('#invite-error').hide();
	   $('#alreadly-invite-project').hide();
	});
	
	
	// Accept Offer By employer
	$('body').on('click', '.accept-offer', function() {
		var pageURL = jQuery(location). attr("href");
	 var JobId =$(this).attr('rel');
		swal({
			 title: "Are you sure you want to Accept this job ?",
			  text: "",
			  icon: "warning",
			  buttons: [
				'No, cancel it!',
				'Yes, I am sure!'
			  ],
			  dangerMode: true,
        }).then(function(isConfirm) {
          if (isConfirm) {
            swal({
              title: 'Accept!',
              text: 'Job has been successfully Accept!',
              icon: 'success'
            }).then(function() {
			
				H5_loading.show(); 
				$.ajax({
					url:base_url+"candidate/offerAcceptReject",
					method:"POST",
					data:{JobId:JobId,jobstatus:1},
					success:function(msg){
						H5_loading.hide();
						window.location.href = pageURL;
					}
				});

			});
          } else {
            swal("Cancelled", "", "error");
          }
        });
           
        });
	  
	  	$('body').on('click', '.reject-offer', function() {
		 var pageURL = jQuery(location). attr("href");
		var JobId =$(this).attr('rel');
		swal({
			 title: "Are you sure you want to Reject this job ?",
			  text: "",
			  icon: "warning",
			  buttons: [
				'No, cancel it!',
				'Yes, I am sure!'
			  ],
			  dangerMode: true,
        }).then(function(isConfirm) {
          if (isConfirm) {
            swal({
              title: 'Reject!',
              text: 'Job has been successfully Reject!',
              icon: 'success'
            }).then(function() {
			
				H5_loading.show(); 
				$.ajax({
					url:base_url+"candidate/offerAcceptReject",
					method:"POST",
					data:{JobId:JobId,jobstatus:2},
					success:function(msg){
						H5_loading.hide();
						window.location.href = pageURL;
					}
				});

			});
          } else {
            swal("Cancelled", "", "error");
          }
        });
           
        });
	
	
	
	
	//Reply User//
	$( "#send_reply" ).click(function(){
		var user_id = $('#user_id').val();
	    var job_id = $('#job_id').val();
	     var apply_job_id = $('#apply_job_id').val();
		//var reply_message = CKEDITOR.instances.editor1.getData();
		var reply_message = $('#editor').val();
		var uploadfilesName = $('#uploadfilesName').val();
		if(reply_message==''){
			$('#reply_message_error').show();
			return false;
		}
		var formData = new FormData();
		var ins = document.getElementById('userJobReplyFile').files.length;
                    for (var x = 0; x < ins; x++) {
                        formData.append("imgFiles[]", document.getElementById('userJobReplyFile').files[x]);
                     }
	
	//formData.append('userJobReplyFile', $('input[type=file]')[0].files[0]); 
	formData.append('userJobReplyFile', $('input[type=file]')[0].files[0]); 
	formData.append('user_id', user_id); 
	formData.append('job_id', job_id); 
	formData.append('reply_message', reply_message); 
		formData.append('uploadfilesName', uploadfilesName);
		H5_loading.show(); 
			$.ajax({
				url:base_url+"job/reply-user",
				method:"POST",
				data: formData,
                contentType: false, 
                processData: false,
				success:function(response){
					H5_loading.hide();
					var obj = jQuery.parseJSON(response);
					if(obj.msg==1){
						$('#myReplyModalSuccess').modal('show');
						$('#myReplyModal').modal('hide');
						$('#editor').val('');
						$('#userJobReplyFile').val('');
						$('#replybtn_'+apply_job_id).hide();
					 // CKEDITOR.instances.editor1.setData("");
					}
					$('#error-message').html(obj.error.error).text();
					
					
				}
			});
	
	});	
	/*CKEDITOR.instances.editor1.on('key', function(e) {
	var reply_message = CKEDITOR.instances.editor1.getData();
		if(reply_message!=''){
		 $('#reply_message_error').hide();
		   
		}
	});*/
	$( "#userJobReplyFile" ).change(function(){
	   $('#error-message').html('');
	});
	
	
	$( "#escrow_setting_form" ).submit(function( event ){ 
    var proceed = true;
    //loop through each field and we simply change border color to red for invalid fields       
        $("#escrow_setting_form input[required=true],#escrow_setting_form select[required=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
                }
                //check invalid email
                var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
                if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                    $(this).css('border-color','red'); //change border color to red  
					//$('#email-error').css('display','block');
					 proceed = false; //set do not proceed flag   
				}
					
        });
       if(proceed==true){}else{event.preventDefault();}
    });
	
	$("#escrow-email").keyup(function() { 
		$('#email-error').css('display','none'); 
	});
	$("#escrow_setting_form input[required=true]").keyup(function() { 
			$(this).css('border-color',''); 
	});
	
	
	
		$( "#escrow_form" ).submit(function( event ){ 
    var proceed = true;
    //loop through each field and we simply change border color to red for invalid fields       
        $("#escrow_form input[required=true],#escrow_form select[required=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
                }
                //check invalid email
                
					
        });
       if(proceed==true){}else{event.preventDefault();}
    });
	
	
	$("#escrow_form input[required=true]").keyup(function() { 
			$(this).css('border-color',''); 
	});
	
	
	$(".paymentmode").change(function() { 
		var paymentmode = 	$(this).val(); 
		if(paymentmode==0){
		  $('#paypal_id').attr('required');
		  $('#stripe_key').removeAttr('required');
		  $('#stripe_secret').removeAttr('required');
			$('#paypalDiv').show();
			$('#stripeDiv').hide();
		}
		if(paymentmode==1){
			$('#paypal_id').removeAttr('required');
			$('#stripe_key').attr('required');
			$('#stripe_secret').attr('required');
			
			$('#paypalDiv').hide();
			$('#stripeDiv').show();
		}
	});
	
	
	
	$( "#paymentmodeform" ).submit(function( event ){ 

    var proceed = true;
    //loop through each field and we simply change border color to red for invalid fields       
        $("#paymentmodeform input[required=true],#paymentmodeform radio[required=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
                }


                 var paymentmode = 	$("input[name='payment_mode']:checked"). val();
                 
                if(paymentmode==0){
             	var paypal_id =$('#paypal_id').val();
             	if(paypal_id==''){
             		$('#paypal_id').css('border-color','red');
             		proceed = false;
             	}
             }
            // alert(paymentmode);
             if(paymentmode==1){
             	var stripe_key =$('#stripe_key').val();
             	var stripe_secret =$('#stripe_secret').val();
             	if(stripe_key==''){
             		$('#stripe_key').css('border-color','red');
             		proceed = false;
             	}
             	if(stripe_secret==''){
             		$('#stripe_secret').css('border-color','red');
             		proceed = false;
             	}
             	
             }
               
					
        });
       if(proceed==true){}else{event.preventDefault();}
    });
	$("#paymentmodeform").keyup(function() { 
		$(this).css('border-color',''); 
	});
	
	//End Here
	
	
	
	
});

