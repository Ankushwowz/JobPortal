$(document).ready(function(){var base_url=$('#base_url').val();$('#country').change(function(){var country_id=$(this).val();if(country_id!=''){H5_loading.show();$.ajax({url:base_url+"dashboard/getState",method:"POST",data:{country_id:country_id},success:function(data){H5_loading.hide();$('#state').html(data);var stateTxt=$('#stateTxt').val();Get_State(stateTxt);$('#city').html('<option value="">Select City</option>')}})}
else{$('#state').html('<option value="">Select State</option>');$('#city').html('<option value="">Select City</option>')}});$('#state').change(function(){var stateid=$(this).val();var stateTxt=$('#stateTxt').val();if(stateid!=''){var state_id=$(this).val()}else{var state_id=stateTxt}
if(state_id!=''){H5_loading.show();$.ajax({url:base_url+"dashboard/getCity",method:"POST",data:{state_id:state_id},success:function(data){H5_loading.hide();$('#city').html(data);var cityTxt=$('#cityTxt').val();Get_City(cityTxt)}})}
else{$('#city').html('<option value="">Select city</option>')}});setTimeout(function(){$("#country").trigger('change');$("#state").trigger('change');$("#category").trigger('change')},1000);$('#addLanguage').typeahead({source:function(query,process){$("#addLanguage").css("background","#FFF url("+base_url+"assets/img/loaderIcon.gif) no-repeat 355px");objects=[];map={};$.ajax({url:base_url+"profile/getLanguage",data:'query='+query,dataType:"json",type:"POST",success:function(Getdata){console.log(Getdata)
$.each(Getdata,function(i,object){map[object.language_name]=object;if(objects.indexOf(object.language_name)===-1){objects.push(object.language_name)}
$('#languageID').val(0)});process(objects);$("#addLanguage").css("background"," rgb(255, 255, 255)")},})},updater:function(item){$('#languageID').val(map[item].language_id);return item}});$('body').on('click','.delete-language',function(){var languageID=$(this).attr('rel');swal({title:"Are you sure you want to delete this language?",text:"",icon:"warning",buttons:['No, cancel it!','Yes, I am sure!'],dangerMode:!0,}).then(function(isConfirm){if(isConfirm){swal({title:'Deleted!',text:'language has been successfully deleted!',icon:'success'}).then(function(){$('#lang_'+languageID).remove();H5_loading.show();$.ajax({url:base_url+"profile/deleteLanguage",method:"POST",data:{languageID:languageID},success:function(msg){H5_loading.hide()}})})}else{swal("Cancelled","","error")}})});$('.enterblock').keypress(function(event){if(event.keyCode===10||event.keyCode===13){event.preventDefault()}});$('#addSkill').typeahead({source:function(query,process){$("#addSkill").css("background","#FFF url("+base_url+"assets/img/loaderIcon.gif) no-repeat 355px");objects=[];map={};$.ajax({url:base_url+"profile/getSkill",data:'query='+query,dataType:"json",type:"POST",success:function(Getdata){$.each(Getdata,function(i,object){map[object.skill_name]=object;if(objects.indexOf(object.skill_name)===-1){objects.push(object.skill_name)}
$('#skillID').val(0)});process(objects);$("#addSkill").css("background"," rgb(255, 255, 255)")}})},updater:function(item){$('#skillID').val(map[item].skill_id);return item}});$('body').on('click','.delete-skill',function(){var skillID=$(this).attr('rel');swal({title:"Are you sure you want to delete this skill",text:"",icon:"warning",buttons:['No, cancel it!','Yes, I am sure!'],dangerMode:!0,}).then(function(isConfirm){if(isConfirm){swal({title:'Deleted!',text:'Skill has been successfully deleted!',icon:'success'}).then(function(){$('#skill_'+skillID).remove();H5_loading.show();$.ajax({url:base_url+"profile/deleteskill",method:"POST",data:{skillID:skillID},success:function(msg){H5_loading.hide()}})})}else{swal("Cancelled","","error")}})});$('body').on('click','.delete-education',function(){var educationID=$(this).attr('rel')
swal({title:"Are you sure you want to delete this education?",text:"",icon:"warning",buttons:['No, cancel it!','Yes, I am sure!'],dangerMode:!0,}).then(function(isConfirm){if(isConfirm){swal({title:'Deleted!',text:'Education has been successfully deleted!',icon:'success'}).then(function(){$('#education_'+educationID).remove();H5_loading.show();$.ajax({url:base_url+"profile/deleteEducation",method:"POST",data:{educationID:educationID},success:function(msg){H5_loading.hide()}})})}else{swal("Cancelled","","error")}})});$('body').on('click','.delete-certification',function(){var certificationID=$(this).attr('rel');swal({title:"Are you sure you want to delete this certification?",text:"",icon:"warning",buttons:['No, cancel it!','Yes, I am sure!'],dangerMode:!0,}).then(function(isConfirm){if(isConfirm){swal({title:'Deleted!',text:'Certification has been successfully deleted!',icon:'success'}).then(function(){$('#certi_'+certificationID).remove();H5_loading.show();$.ajax({url:base_url+"profile/deleteCertification",method:"POST",data:{certificationID:certificationID},success:function(msg){H5_loading.hide()}})})}else{swal("Cancelled","","error")}})});$('body').on('change','#userfile',function(){$("#profile-image-error").html('');var formData=new FormData();formData.append('userfile',$('input[type=file]')[0].files[0]);H5_loading.show();$.ajax({url:base_url+"profile/uploadUserImage",method:"POST",data:formData,contentType:!1,processData:!1,success:function(msg){var obj=jQuery.parseJSON(msg);H5_loading.hide();if(obj.result!=''){$(".userimage").replaceWith(obj.result)}else{$("#profile-image-error").html(obj.error.error)}}})});$(".digits-cls").keypress(function(e){if(e.which!=8&&e.which!=0&&(e.which<48||e.which>57)){return!1}});$('body').on('click','.delete-jobs',function(){var jobID=$(this).attr('rel');swal({title:"Are you sure you want to delete this job?",text:"",icon:"warning",buttons:['No, cancel it!','Yes, I am sure!'],dangerMode:!0,}).then(function(isConfirm){if(isConfirm){swal({title:'Deleted!',text:'job has been successfully deleted!',icon:'success'}).then(function(){$('#job-'+jobID).remove();H5_loading.show();$.ajax({url:base_url+"job/deleteJob",method:"POST",data:{jobID:jobID},success:function(msg){H5_loading.hide()}})})}else{swal("Cancelled","","error")}})});$('#category').change(function(){var category_id=$(this).val();if(category_id!=''){H5_loading.show();$.ajax({url:base_url+"profile/getSubCategory",method:"POST",data:{category_id:category_id},success:function(data){H5_loading.hide();$('#subcategory').html(data);var subcategory=$('#subcategoryTxt').val();Get_SubCategory(subcategory)}})}});$('body').on('click','.delete-portfolio',function(){var portfolioID=$(this).attr('rel');swal({title:"Are you sure you want to delete this Portfolio Image?",text:"",icon:"warning",buttons:['No, cancel it!','Yes, I am sure!'],dangerMode:!0,}).then(function(isConfirm){if(isConfirm){swal({title:'Deleted!',text:'Portfolio Image has been successfully deleted!',icon:'success'}).then(function(){$('#portfolio-'+portfolioID).remove();H5_loading.show();$.ajax({url:base_url+"profile/deletePortfolio",method:"POST",data:{portfolioID:portfolioID},success:function(msg){H5_loading.hide()}})})}else{swal("Cancelled","","error")}})});$('body').on('click','.job-delete-skill',function(){var skillID=$(this).attr('rel');swal({title:"Are you sure you want to delete this skill",text:"",icon:"warning",buttons:['No, cancel it!','Yes, I am sure!'],dangerMode:!0,}).then(function(isConfirm){if(isConfirm){swal({title:'Deleted!',text:'Skill has been successfully deleted!',icon:'success'}).then(function(){$('#jobsskill_'+skillID).remove();H5_loading.show();$.ajax({url:base_url+"job/deletesJobskill",method:"POST",data:{skillID:skillID},success:function(msg){H5_loading.hide()}})})}else{swal("Cancelled","","error")}})});getRecentJobs(1);$("#load_more").click(function(e){e.preventDefault();var page=$(this).data('val');getRecentJobs(page)});var scroll=function(){$('html, body').animate({scrollTop:$('#load_more').offset().top},1000)};$('body').on('click','#chatButton',function(){var senderId=$('#senderId').val();var receiverId=$('#receiverId').val();var uploadfilesName=$('#uploadfilesName').val();var message_job_id=$('#message_job_id').val();if($('#chatText').val()==""&&$('#chatFile').val()==""){$('#chatText').css('border','1px solid red');return!1}
if(senderId!=''&&receiverId!=''){var chatText=$('#chatText').val();var formData=new FormData();var ins=document.getElementById('chatFile').files.length;for(var x=0;x<ins;x++){}
formData.append('senderId',senderId);formData.append('receiverId',receiverId);formData.append('chatText',chatText);formData.append('uploadfilesName',uploadfilesName);formData.append('message_job_id',message_job_id);$.ajax({url:base_url+"message/sendChat",method:"POST",data:formData,contentType:!1,processData:!1,success:function(response){$('#chatText').val('');$('#scrollvalue').val('0');$('#chatFile').val('');$('#status').html('');singleChat(senderId,receiverId,message_job_id)}})}});$('body').on('keyup','#chatText',function(){$('#chatText').css('border','')});$('body').on('keypress','#chatText',function(event){var senderId=$('#senderId').val();var receiverId=$('#receiverId').val();var message_job_id=$('#message_job_id').val();if(event.keyCode==13){if(event.shiftKey){event.stopPropagation()}else{if($('#chatText').val()==""&&$('#chatFile').val()==""){$('#chatText').css('border','1px solid red');return!1}
if(senderId!=''&&receiverId!=''){var chatText=$('#chatText').val();var formData=new FormData();var ins=document.getElementById('chatFile').files.length;for(var x=0;x<ins;x++){formData.append("imgFiles[]",document.getElementById('chatFile').files[x])}
formData.append('chatFile',$('input[type=file]')[0].files[0]);formData.append('senderId',senderId);formData.append('receiverId',receiverId);formData.append('chatText',chatText);formData.append('message_job_id',message_job_id);$.ajax({url:base_url+"message/sendChat",method:"POST",data:formData,contentType:!1,processData:!1,success:function(response){$('#chatText').val('');$('#scrollvalue').val('0');$('#chatFile').val('');singleChat(senderId,receiverId,message_job_id)}})}}}});$('body').on('keyup','#searchUser',function(){var userName=$('#searchUser').val();$.ajax({url:base_url+"message/searchChatUser",method:"POST",data:{userName:userName},success:function(response){$('#online_user_list').replaceWith(response)}})});var timer=null;$("div .messages").scroll(function(){if($(this).scrollTop()+$(this).innerHeight()>=$(this)[0].scrollHeight){timer=setTimeout("getNotificationUserChat()",5000)}else{clearTimeout(timer)}});$('body').on('click','.complete_job',function(){var pageURL=jQuery(location).attr("href");var ID=$(this).attr('rel');swal({title:"Are you sure you want to complete this job",text:"",icon:"warning",buttons:['No, cancel it!','Yes, I am sure!'],dangerMode:!0,}).then(function(isConfirm){if(isConfirm){swal({title:'Completed!',text:'Job has been successfully completed!',icon:'success'}).then(function(){H5_loading.show();$.ajax({url:base_url+"candidate/completeJob",method:"POST",data:{ID:ID,job_status:5},success:function(msg){H5_loading.hide();window.location.href=pageURL}})})}else{swal("Cancelled","","error")}})});$('body').on('click','.assign_job',function(){var pageURL=jQuery(location).attr("href");var ID=$(this).attr('rel');swal({title:"Are you sure you want to Assign this job",text:"",icon:"warning",buttons:['No, cancel it!','Yes, I am sure!'],dangerMode:!0,}).then(function(isConfirm){if(isConfirm){swal({title:'Completed!',text:'Job has been successfully assign!',icon:'success'}).then(function(){H5_loading.show();$.ajax({url:base_url+"candidate/completeJob",method:"POST",data:{ID:ID,job_status:3},success:function(msg){H5_loading.hide();window.location.href=pageURL}})})}else{swal("Cancelled","","error")}})});$("#question1 .stars").click(function(){var rate=$(this).val();$('#answer1').val(rate);$(this).attr("checked");$('#error-1').hide()});$("#question2 .stars").click(function(){var rate=$(this).val();$('#answer2').val(rate);$(this).attr("checked");$('#error-2').hide()});$("#question3 .stars").click(function(){var rate=$(this).val();$('#answer3').val(rate);$(this).attr("checked");$('#error-3').hide()});$("#question4 .stars").click(function(){var rate=$(this).val();$('#answer4').val(rate);$(this).attr("checked");$('#error-4').hide()});$('body').on('click','#submit_review',function(){var answer1=$('#answer1').val();var answer2=$('#answer2').val();var answer3=$('#answer3').val();var answer4=$('#answer4').val();var general_feedback=$('#general_feedback').val();var to_id=$('#to_id').val();var job_id=$('#job_id').val();if(answer1==''){$('#error-1').show();return!1}
if(answer2==''){$('#error-2').show();return!1}
if(answer3==''){$('#error-3').show();return!1}
if(answer4==''){$('#error-4').show();return!1}
if(general_feedback==''){$('#general_feedback').css('border-color','red');return!1}
$.ajax({url:base_url+"candidate/sendRatting",method:"POST",data:{answer1:answer1,answer2:answer2,answer3:answer3,answer4:answer4,to_id:to_id,general_feedback:general_feedback,job_id:job_id},success:function(response){if(response==1){window.location.href=base_url+'completed-job'}}})});$('body').on('click','.resend_Job',function(){var pageURL=jQuery(location).attr("href");var ID=$(this).attr('rel');swal({title:"Are you sure you want to resend this job",text:"",icon:"warning",buttons:['No, cancel it!','Yes, I am sure!'],dangerMode:!0,}).then(function(isConfirm){if(isConfirm){swal({title:'Completed!',text:'Job has been successfully resend!',icon:'success'}).then(function(){H5_loading.show();$.ajax({url:base_url+"candidate/resendJob",method:"POST",data:{ID:ID,job_status:4},success:function(msg){H5_loading.hide();window.location.href=pageURL}})})}else{swal("Cancelled","","error")}})});$('body').on('change','#change_job_status',function(){var pageURL=jQuery(location).attr("href");var str=$(this).val();var res=str.split("_");swal({title:"Are you sure you want to assigned again this job",text:"",icon:"warning",buttons:['No, cancel it!','Yes, I am sure!'],dangerMode:!0,}).then(function(isConfirm){if(isConfirm){swal({title:'Completed!',text:'Job has been successfully assigned again!',icon:'success'}).then(function(){H5_loading.show();$.ajax({url:base_url+"candidate/assigned_again",method:"POST",data:{ID:res[1],job_status:res[0]},success:function(msg){H5_loading.hide();window.location.href=pageURL}})})}else{swal("Cancelled","","error")}})});$('body').on('click','.assign_job_cls',function(){var pageURL=jQuery(location).attr("href");var UserId=$(this).attr('rel');var job_id=$(this).attr('job_id');swal({title:"Are you sure you want to Assign this job",text:"",icon:"warning",buttons:['No, cancel it!','Yes, I am sure!'],dangerMode:!0,}).then(function(isConfirm){if(isConfirm){swal({title:'Completed!',text:'Job has been successfully assign!',icon:'success'}).then(function(){H5_loading.show();$.ajax({url:base_url+"candidate/assign_job_by_response",method:"POST",data:{UserId:UserId,job_id:job_id,job_status:3},success:function(msg){H5_loading.hide();window.location.href=pageURL}})})}else{swal("Cancelled","","error")}})})});$(window).load(function(){getNotificationUserChat();getUserInfo(null)});function giveRatting(inviteID,starRatting){var rate=starRatting;alert(starRatting);var start_value=$('#start_value_'+inviteID).val(rate);return!1}
function getRecentJobs(page){var base_url=$('#base_url').val();var page=parseInt(page);H5_loading.show();$.ajax({url:base_url+"home/recentjob",type:'GET',data:{page:page}}).done(function(response){var returnedData=JSON.parse(response);console.log(returnedData);if(returnedData.numPages==page){$('#load_more').hide();H5_loading.hide()}
$("#main-recentJobs").append(returnedData.html);H5_loading.hide();$('#load_more').data('val',($('#load_more').data('val')+1));scroll()})}
function Get_State(stateId){$('#state').val(stateId);return!1}
function Get_City(cityID){$('#city').val(cityID);return!1}
function Get_SubCategory(subcategoryID){$('#subcategory').val(subcategoryID);return!1}
function replyUserByJob(userId,jobId,userName,apply_job_id){$('#user_id').val(userId);$('#job_id').val(jobId);$('#userName').text(userName);$('#apply_job_id').val(apply_job_id)}
function singleChat(senderId,receiverId,jobid){$('#receiverId').val(receiverId);$('#message_job_id').val(jobid);$('#txt-message ').css('display','none');var userName=$('#searchUser').val();var base_url=$('#base_url').val();H5_loading.show();$.ajax({url:base_url+"message/getChat",method:"POST",data:{senderId:senderId,receiverId:receiverId,userName:userName,message_job_id:jobid},success:function(response){H5_loading.hide();var returnedData=JSON.parse(response);$('#ul_message').replaceWith(returnedData.userChat);$('#online_user_list').replaceWith(returnedData.loginUser);scrollBottom()}})}
function scrollBottom(){var scrollvalue=$('#scrollvalue').val();if($('.messages').length!=0){var height=$(".messages")[0].scrollHeight;$(".messages").scrollTop(height)}}
function getNotificationUserChat(){var senderId=$('#senderId').val();var receiverId=$('#receiverId').val();var base_url=$('#base_url').val();var userName=$('#searchUser').val();var message_job_id=$('#message_job_id').val();var pageURL=jQuery(location).attr("href");var myarray=pageURL.split("/");var array=[];array=array.concat(myarray);if(jQuery.inArray("messages",array)!=-1){if($('div .messages').scrollTop()+$('div .messages').innerHeight()>=$('div .messages')[0].scrollHeight){console.log('123');$.ajax({url:base_url+"message/getChat",method:"POST",data:{senderId:senderId,receiverId:receiverId,userName:userName,message_job_id:message_job_id},success:function(response){var returnedData=JSON.parse(response);$('#ul_message').replaceWith(returnedData.userChat);$('#online_user_list').replaceWith(returnedData.loginUser);$('#upload_files').replaceWith(returnedData.uplaodFiles);$('.messagecount').replaceWith(returnedData.UnreadCount);$('.responejobcount').replaceWith(returnedData.UnreadResponeCount);$('.assignedJobcount').replaceWith(returnedData.UnreadAssignedJob);$('.invitationJob').replaceWith(returnedData.InvitationJob);$('.inviteuser').replaceWith(returnedData.inviteuser);$('.completedJobcount').replaceWith(returnedData.CompletedJob);scrollBottom()}})}else{console.log('456')}}else{$.ajax({url:base_url+"message/getChat",method:"POST",data:{senderId:senderId,receiverId:receiverId,userName:userName},success:function(response){var returnedData=JSON.parse(response);$('#ul_message').replaceWith(returnedData.userChat);$('#online_user_list').replaceWith(returnedData.loginUser);$('#upload_files').replaceWith(returnedData.uplaodFiles);$('.messagecount').replaceWith(returnedData.UnreadCount);$('.responejobcount').replaceWith(returnedData.UnreadResponeCount);$('.assignedJobcount').replaceWith(returnedData.UnreadAssignedJob);$('.invitationJob').replaceWith(returnedData.InvitationJob);$('.inviteuser').replaceWith(returnedData.inviteuser);$('.completedJobcount').replaceWith(returnedData.CompletedJob);scrollBottom()}})}
return!1}
function getUserInfo(receiverId){var base_url=$('#base_url').val();var receiverId=$('#receiverId').val();var message_job_id=$('#message_job_id').val();$.ajax({url:base_url+"message/getuserInfo",method:"POST",data:{receiverId:receiverId,message_job_id:message_job_id},success:function(response){$('#contact-profile').replaceWith(response)}});return!1}
setInterval("getNotificationUserChat()",5000);function GetSessionInfo(sessionId,roleid){var base_url=$('#base_url').val();$.ajax({url:base_url+"message/ajax/getSession.php",method:"POST",data:{sessionId:sessionId,roleid:roleid},success:function(response){return!1}})}
function _(el){return document.getElementById(el)}
function uploadFile(){var base_url=$('#base_url').val();var file=_("userfile_id").files[0];if(file.size>8289384){$('#sizeerror').show();return!1}
var formdata=new FormData();formdata.append("userfile",file);var ajax=new XMLHttpRequest();ajax.upload.addEventListener("progress",progressHandler,!1);ajax.addEventListener("load",completeHandler,!1);ajax.addEventListener("error",errorHandler,!1);ajax.addEventListener("abort",abortHandler,!1);ajax.open("POST",base_url+"job/uploadfiles");ajax.send(formdata)}
function uploadmessageFile(){var base_url=$('#base_url').val();var file=_("chatFile").files[0];var formdata=new FormData();formdata.append("userfile",file);var ajax=new XMLHttpRequest();ajax.upload.addEventListener("progress",progressHandler,!1);ajax.addEventListener("load",completeHandler,!1);ajax.addEventListener("error",errorHandler,!1);ajax.addEventListener("abort",abortHandler,!1);ajax.open("POST",base_url+"message/uploadfiles");ajax.send(formdata)}
function progressHandler(event){var percent=(event.loaded/event.total)*100;_("progressBar").value=Math.round(percent);_("status").innerHTML=Math.round(percent)+"% uploaded... please wait"}
function completeHandler(event){_("uploadfilesName").value=event.target.responseText;_("status").innerHTML=event.target.responseText;_("progressBar").value=0}
function errorHandler(event){_("status").innerHTML="Upload Failed"}
function abortHandler(event){_("status").innerHTML="Upload Aborted"}