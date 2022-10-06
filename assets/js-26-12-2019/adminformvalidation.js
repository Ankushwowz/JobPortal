$(document).ready(function(){
    var base_url =$('#base_url').val();
    //alert(base_url); return false;
	//*********** Delete Page *************//
	
	  jQuery(".delete-page").click(function(e){ 
	   //alert('test');
	   //return false;
	  // $('body').on('click', '.delete-education', function() {
             e.preventDefault();
			var pageid=  jQuery(this).attr('rel');
			//alert(userid);
			//return false;
			swal({
          title: "Are you sure?",
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
              text: 'Page are successfully Deleted!',
              icon: 'success'
            }).then(function() {
            //var baseUrl = "<?php echo base_url()?>";
                jQuery.ajax({
                type: "POST",
				url:base_url+"administrator/pagedelete",
                data: {
                
                pageid : pageid
                },
                success: function(msg) 
                {
                if(msg==1){
                  window.location.href = base_url+'view-pages'; 
                  //jQuery(this).closest("tr").remove();
                }
                else{
                //alert('else');
                }

                }

                });

			});
          } else {
            swal("Cancelled", "", "error");
          }
        });
           
        });
	
	//*********** Delete Page End*************//
	
	
	//*********** Change Job Status *************//
	
	 jQuery('.change-job-status').click(function(){        
       var jobid=  jQuery(this).attr('rel');
        jQuery('#jobid').val(jobid);
      });

       jQuery('#change-status-submit').click(function(){
		var jobstatusid = jQuery('#jobstatus').val();
        var jobid = jQuery('#jobid').val();

		swal({
          title: "Are you sure?",
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
              title: 'Status Changed!',
              text: 'Job Status are successfully Changed!',
              icon: 'success'
            }).then(function() {
            //var baseUrl = "<?php echo base_url()?>";
                jQuery.ajax({
                type: "POST",
				url:base_url+"administrator/Change_Jobstatus",
                data: {
                jobstatusid :jobstatusid,
				jobid : jobid
                },
                success: function(msg) 
                {
                if(msg==1){
                  window.location.href = base_url+'joblist'; 
                  //jQuery(this).closest("tr").remove();
                }
                else{
                //alert('else');
                }
                }
                });
			});
          } else {
            swal("Cancelled", "", "error");
          }
        });

      });
	
	//*********** Change Job Status End*************//
	
	
	
	//*********** Delete Languages *************//	
       
	 jQuery(".delete-languages").click(function(e){ 
	   //alert('test');
	   //return false;
	  // $('body').on('click', '.delete-education', function() {
             e.preventDefault();
			var languageid=  jQuery(this).attr('rel');
			//alert(userid);
			//return false;
			swal({
          title: "Are you sure?",
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
              text: 'Language are successfully Deleted!',
              icon: 'success'
            }).then(function() {
            //var baseUrl = "<?php echo base_url()?>";
                jQuery.ajax({
                type: "POST",
				url:base_url+"administrator/languagedelete",
                data: {
                
                languageid : languageid
                },
                success: function(msg) 
                {
                if(msg==1){
                  window.location.href = base_url+'view-languages'; 
                  //jQuery(this).closest("tr").remove();
                }
                else{
                //alert('else');
                }

                }

                });

			});
          } else {
            swal("Cancelled", "", "error");
          }
        });
           
        });
	
	//*********** Delete Language End *************//	
	
	
	//*********** Delete Skills *************//	
       
	 jQuery(".delete-skills").click(function(e){ 
	   //alert('test');
	   //return false;
	  // $('body').on('click', '.delete-education', function() {
             e.preventDefault();
			var skillid=  jQuery(this).attr('rel');
			//alert(userid);
			//return false;
			swal({
          title: "Are you sure?",
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
              text: 'Skill are successfully Deleted!',
              icon: 'success'
            }).then(function() {
            //var baseUrl = "<?php echo base_url()?>";
                jQuery.ajax({
                type: "POST",
				url:base_url+"administrator/skilldelete",
                data: {
                
                skillid : skillid
                },
                success: function(msg) 
                {
                if(msg==1){
                  window.location.href = base_url+'view-skills'; 
                  //jQuery(this).closest("tr").remove();
                }
                else{
                //alert('else');
                }

                }

                });

			});
          } else {
            swal("Cancelled", "", "error");
          }
        });
           
        });
	
	//*********** Delete Skills End *************//	
	
	//*********** Delete Category *************//	
       
	   jQuery(".delete-category").click(function(e){ 
	   //alert('test');
	   //return false;
	  // $('body').on('click', '.delete-education', function() {
             e.preventDefault();
			var categoryid=  jQuery(this).attr('rel');
			//alert(userid);
			//return false;
			swal({
          title: "Are you sure?",
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
              text: 'Category are successfully Deleted!',
              icon: 'success'
            }).then(function() {
            //var baseUrl = "<?php echo base_url()?>";
                jQuery.ajax({
                type: "POST",
				url:base_url+"administrator/categorydelete",
                data: {
                
                categoryid : categoryid
                },
                success: function(msg) 
                {
                if(msg==1){
                  window.location.href = base_url+'view-category'; 
                  //jQuery(this).closest("tr").remove();
                }
                else{
                //alert('else');
                }

                }

                });

			});
          } else {
            swal("Cancelled", "", "error");
          }
        });
           
        });
	
	//*********** Delete Category End *************//
	
	//*********** Delete Sub Category *************//	
       
	   jQuery(".delete-subcategory").click(function(e){ 
	   //alert('test');
	   //return false;
	  // $('body').on('click', '.delete-education', function() {
             e.preventDefault();
			var subcategoryid=  jQuery(this).attr('rel');
			//alert(userid);
			//return false;
			swal({
          title: "Are you sure?",
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
              text: 'Subcategory are successfully Deleted!',
              icon: 'success'
            }).then(function() {
            //var baseUrl = "<?php echo base_url()?>";
                jQuery.ajax({
                type: "POST",
				url:base_url+"administrator/subcategorydelete",
                data: {
                
                subcategoryid : subcategoryid
                },
                success: function(msg) 
                {
                if(msg==1){
                  window.location.href = base_url+'view-subcategory'; 
                  //jQuery(this).closest("tr").remove();
                }
                else{
                //alert('else');
                }

                }

                });

			});
          } else {
            swal("Cancelled", "", "error");
          }
        });
           
        });
	
	//*********** Delete Sub Category End *************//
	
	
	
	
	
	//*********** Delete User *************//	
       
	   jQuery(".delete-user").click(function(e){
		//alert('sdgd);		   
		//return false;
	  // $('body').on('click', '.delete-education', function() {
             e.preventDefault();
			var userid=  jQuery(this).attr('rel');
			//alert(userid);
			//return false;
			swal({
          title: "Are you sure?",
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
              text: 'User are successfully Deleted!',
              icon: 'success'
            }).then(function() {
            //var baseUrl = "<?php echo base_url()?>";
                jQuery.ajax({
                type: "POST",
				url:base_url+"administrator/delete",
                data: {
                
                userid : userid
                },
                success: function(msg) 
                {
                if(msg==1){
                  window.location.href = base_url+'users-listing'; 
                  //jQuery(this).closest("tr").remove();
                }
                else{
                //alert('else');
                }

                }

                });

			});
          } else {
            swal("Cancelled", "", "error");
          }
        });
           
        });
	
	//*********** Delete User End *************//
	
	
	//*********** Change User Status *************//
	
	 jQuery('.change-role-cls').click(function(){        
       var userid=  jQuery(this).attr('rel');
        jQuery('#userid').val(userid);
      });

       jQuery('#change-role-submit').click(function(){
		var statusid = jQuery('#status').val();
        var userid = jQuery('#userid').val();
		//alert(statusid);
		//alert(userid); return false;
        //var baseUrl = "<?php echo base_url()?>";
        
		swal({
          title: "Are you sure?",
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
              title: 'Status Changed!',
              text: 'User Status are successfully Changed!',
              icon: 'success'
            }).then(function() {
            //var baseUrl = "<?php echo base_url()?>";
                jQuery.ajax({
                type: "POST",
				url:base_url+"administrator/change_status",
                data: {
                statusid :statusid,
				userid : userid
                },
                success: function(msg) 
                {
                if(msg==1){
                  window.location.href = base_url+'users-listing'; 
                  //jQuery(this).closest("tr").remove();
                }
                else{
                //alert('else');
                }
                }
                });
			});
          } else {
            swal("Cancelled", "", "error");
          }
        });

      });
	
	//*********** Change User Status End*************//
	
	
});

