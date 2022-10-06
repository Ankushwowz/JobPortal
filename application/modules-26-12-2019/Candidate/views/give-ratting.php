<style>
   @import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
   .form-group {
   text-align:left;
   }
   fieldset, label {
   margin: 0;
   padding: 0;
   }
   .rating {
   border: none;
   float: right;
   }
   .rating > input {
   display: none;
   }
   .rating > label:before {
   margin: 5px;
   font-size: 1.25em;
   font-family: FontAwesome;
   display: inline-block;
   content: "\f005";
   }
   .rating > .half:before {
   content: "\f089";
   position: absolute;
   }
   .rating > label {
   color: #ddd;
   float: right;
   }
   .rating > input:checked ~ label,  .rating:not(:checked) > label:hover,  .rating:not(:checked) > label:hover ~ label {
   color: #FFD700;
   }
   .rating > input:checked + label:hover,  .rating > input:checked ~ label:hover,  .rating > label:hover ~ input:checked ~ label,  .rating > input:checked ~ label:hover ~ label {
   color: #FFED85;
   }
   .error-ratting {
	float: right;
	font-size: 13px;
    color: red;
    padding: 5px 0px 0 0;
	}
</style>
<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
   <div class="content-area5 dashboard-content">
      <div class="dashboard-header clearfix">
         <div class="row">
            <div class="col-sm-12 col-md-6">
               <h4><?php if(!empty($JobsList['job_title'])) { echo $JobsList['job_title'];} ?></h4>
            </div>
            <div class="col-sm-12 col-md-6">
             
            </div>
         </div>
      </div>
      <div class="submit-address dashboard-list">
         <div class="row pad-20">
            <div class="col-lg-12">
               
                  <div class="form-group">
                     <label for="overallexperience">Communication</label>
                     <fieldset id="question1" class="rating">
                        <input class="stars" type="radio" id="star5_1" name="rating1" value="5">
                        <label class="full" for="star5_1" title="Awesome - 5 stars"></label>
                        <input class="stars" type="radio" id="star4_1" name="rating1" value="4">
                        <label class="full" for="star4_1" title="Pretty good - 4 stars"></label>
                        <input class="stars" type="radio" id="star3_1" name="rating1" value="3">
                        <label class="full" for="star3_1" title="Meh - 3 stars"></label>
                        <input class="stars" type="radio" id="star2_1" name="rating1" value="2">
                        <label class="full" for="star2_1" title="Kinda bad - 2 stars"></label>
                        <input class="stars" type="radio" id="star1_1" name="rating1" value="1">
                        <label class="full" for="star1_1" title="Sucks big time - 1 star"></label>
						
                     </fieldset>
					 <span id="error-1" class="error-ratting" style="display:none;">Please give ratting </span>
                     <input type="hidden" name="answer1" id="answer1" value="">
                    
                     
                  </div>
                  <div class="form-group">
                     <label for="overallexperience">Technical knowledge</label>
                        <fieldset id="question2" class="rating">
                        <input class="stars" type="radio" id="star5_2" name="rating2" value="5">
                        <label class="full" for="star5_2" title="Awesome - 5 stars"></label>
                        <input class="stars" type="radio" id="star4_2" name="rating2" value="4">
                        <label class="full" for="star4_2" title="Pretty good - 4 stars"></label>
                        <input class="stars" type="radio" id="star3_2" name="rating2" value="3">
                        <label class="full" for="star3_2" title="Meh - 3 stars"></label>
                        <input class="stars" type="radio" id="star2_2" name="rating2" value="2">
                        <label class="full" for="star2_2" title="Kinda bad - 2 stars"></label>
                        <input class="stars" type="radio" id="star1_2" name="rating2" value="1">
                        <label class="full" for="star1_2" title="Sucks big time - 1 star"></label>
                     </fieldset>
                     <input type="hidden" name="answer2" id="answer2" value="">
                     <span id="error-2" class="error-ratting" style="display:none;">Please give rating </span>
                  </div>
                  <div class="form-group">
                     <label for="overallexperience">Deadline</label>
						<fieldset id="question3" class="rating">
                        <input class="stars" type="radio" id="star5_3" name="rating3" value="5">
                        <label class="full" for="star5_3" title="Awesome - 5 stars"></label>
                        <input class="stars" type="radio" id="star4_3" name="rating3" value="4">
                        <label class="full" for="star4_3" title="Pretty good - 4 stars"></label>
                        <input class="stars" type="radio" id="star3_3" name="rating3" value="3">
                        <label class="full" for="star3_3" title="Meh - 3 stars"></label>
                        <input class="stars" type="radio" id="star2_3" name="rating3" value="2">
                        <label class="full" for="star2_3" title="Kinda bad - 2 stars"></label>
                        <input class="stars" type="radio" id="star1_3" name="rating3" value="1">
                        <label class="full" for="star1_3" title="Sucks big time - 1 star"></label>
                     </fieldset>
                     <input type="hidden" name="answer3" id="answer3" value="">
					  <span id="error-3" class="error-ratting" style="display:none;">Please give rating </span>
                  </div>
                  <div class="form-group">
                     <label for="overallexperience">Would you recommend this User?
                     </label>
                        <fieldset id="question4" class="rating">
                        <input class="stars" type="radio" id="star5_4" name="rating4" value="5">
                        <label class="full" for="star5_4" title="Awesome - 5 stars"></label>
                        <input class="stars" type="radio" id="star4_4" name="rating4" value="4">
                        <label class="full" for="star4_4" title="Pretty good - 4 stars"></label>
                        <input class="stars" type="radio" id="star3_4" name="rating4" value="3">
                        <label class="full" for="star3_4" title="Meh - 3 stars"></label>
                        <input class="stars" type="radio" id="star2_4" name="rating4" value="2">
                        <label class="full" for="star2_4" title="Kinda bad - 2 stars"></label>
                        <input class="stars" type="radio" id="star1_4" name="rating4" value="1">
                        <label class="full" for="star1_4" title="Sucks big time - 1 star"></label>
						
                     </fieldset>
                     <input type="hidden" name="answer4" id="answer4" value="">
                      <span id="error-4" class="error-ratting" style="display:none;">Please give rating </span>
                     
                  </div>
           
                  <div class="form-group">
                     <label for="StarRating" style="width:100%;float:left;">General Feedback</label>
                     <textarea id="general_feedback"  name="general_feedback" rows="4" cols="50" ></textarea>
                  </div>
				 
				  <input type="hidden" name="job_id" id="job_id" value="<?php echo $this->uri->segment(2);?>">
				  <?php if($this->session->userdata('Session_data')['role']==2){?>
				  <input type="hidden" name="to_id" id="to_id" value="<?php echo base64_encode($inviteUser['candidate_id']);?>">
				  <?php }?>
				   <?php if($this->session->userdata('Session_data')['role']==1){?>
				  <input type="hidden" name="to_id" id="to_id" value="<?php echo base64_encode($inviteUser['employer_id']);?>">
				  <?php }?>
				
                  <input   type="button" name="submit_review" class="btn btn-success" id="submit_review" style=" border: medium none; color: rgb(255, 255, 255); font-size: 14px; font-weight: bold; text-decoration: none; text-transform: capitalize; margin-top:10px;" value="Give Rating" placeholder="">
           
            </div>
         </div>
      </div>
   </div>
</div>