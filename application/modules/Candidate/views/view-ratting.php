<style>
.checked {
  color: orange;
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
               <?php //echo"<pre>"; print_r($ratting);
			   ?>
                  <div class="form-group">
                     <label for="overallexperience">Communication</label>
                     <fieldset id="question1" class="rating">
					 <?php for($i=0; $i<5; $i++){?>
						<span class="fa fa-star <?php if($ratting['question1']>$i){echo'checked';}?>"></span>
					 <?php } ?>	
                  </div>
                  <div class="form-group">
                     <label for="overallexperience">Technical knowledge</label>
                        <fieldset id="question2" class="rating">
						<?php for($i=0; $i<5; $i++){?>
						<span class="fa fa-star <?php if($ratting['question2']>$i){echo'checked';}?>"></span>
					 <?php } ?>
                     </fieldset>
                    
                    
                  </div>
                  <div class="form-group">
                     <label for="overallexperience">Deadline</label>
						<fieldset id="question3" class="rating">
                        <?php for($i=0; $i<5; $i++){?>
						<span class="fa fa-star <?php if($ratting['question3']>$i){echo'checked';}?>"></span>
					 <?php } ?>
                     </fieldset>
                     <input type="hidden" name="answer3" id="answer3" value="">
                  </div>
                  <div class="form-group">
                     <label for="overallexperience">Would you recommend this User?
                     </label>
                        <fieldset id="question4" class="rating">
                        <?php for($i=0; $i<5; $i++){?>
						<span class="fa fa-star <?php if($ratting['question4']>$i){echo'checked';}?>"></span>
					 <?php } ?>
                     </fieldset>
                     <input type="hidden" name="answer4" id="answer4" value="">
                     
                     
                  </div>
           
                  <div class="form-group">
                     <label for="StarRating" style="width:100%;float:left;">General Feedback:</label>
                     <p><?php if(!empty($ratting['general_feedback']))  { echo  $ratting['general_feedback'];} ?></p>
                  </div>
				 
			
           
            </div>
         </div>
      </div>
   </div>
</div>