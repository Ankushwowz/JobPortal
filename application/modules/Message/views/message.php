<div class="col-lg-9 col-md-12 col-sm-12 col-pad">   <div class="content-area5">      <div class="dashboard-content">         <div class="dashboard-header clearfix">            <div class="row">               <div class="col-sm-12 col-md-6">                  <h4>Hello ,<?php if(!empty($user['fullname'])) { echo ucfirst($user['fullname']); }?></h4>               </div>			   			    <div class="row">                           <div class="col-md-12">                              <div id="frame">                                 <div id="sidepanel">                                    <div id="profile">                                       <div class="wrap">                                           <?php if(!empty($user['image'])) {?>                                            <img  id="profile-img"src="<?php echo base_url;?>/assets/img/profileimage/<?php echo $user['image'];?>" alt="profile-photo " class="online">										<?php } else{ ?>										<img id="profile-img" src="<?php echo base_url;?>/assets/img/avatar/avatar-1.jpg" alt="avatar " class="userimage">										<?php } ?>                                          <p><?php if(!empty($user['fullname'])) { echo $user['fullname'];}?></p>                                       </div>                                    </div>                                    <div id="search">                                       <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>                                       <input type="text" placeholder="Search contacts..." />                                    </div>                                    <div id="contacts">                                       <ul>									   <?php 									   while($RowUserChat = mysqli_fetch_array($ResultUserChat)){  ?>                                          <li class="contact">                                             <div class="wrap" onclick="singleChat('<?php echo $UserId;?>','<?php echo $RowUserChat['id'];?>')">                                                <span class="contact-status online"></span>																								<?php if(!empty($RowUserChat['image'])) {?>													<img  id="profile-img"src="<?php echo base_url;?>/assets/img/profileimage/<?php echo $RowUserChat['image'];?>" alt="profile-photo " >												<?php } else{ ?>													<img id="profile-img" src="<?php echo base_url;?>/assets/img/avatar/avatar-1.jpg" alt="avatar ">												<?php } ?>                                                                                               <div class="meta">                                                   <p class="name"><?php if(!empty($RowUserChat['fullname'])) { echo $RowUserChat['fullname'];}?></p>                                                   <p class="preview"></p>                                                </div>                                             </div>                                          </li>									   <?php } ?>                                          <!--<li class="contact active">                                             <div class="wrap">                                                <span class="contact-status busy"></span>                                                <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />                                                <div class="meta">                                                   <p class="name">Harvey Specter</p>                                                   <p class="preview">Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>                                                </div>                                             </div>                                          </li>-->                                       </ul>                                    </div>                                    <div id="bottom-bar">                                       <button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>                                       <button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>                                    </div>                                 </div>                                 <div class="content">                                    <div class="contact-profile">                                       <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />                                       <p>Harvey Specter</p>                                    </div>                                    <div class="messages">                                       <ul id="ul_message">                                          <!--<li class="sent">                                             <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />                                             <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>                                          </li>                                          <li class="replies">                                             <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />                                             <p>When you're backed against the wall, break the god damn thing down.</p>                                          </li>-->                                                                              </ul>                                    </div>                                    <div class="message-input">                                       <div class="wrap">                                          <!--<input type="text" placeholder="Write your message..." />-->										  <textarea id="chatText" type="text" class="chatText"></textarea>										  <input type="hidden" name="senderId" id="senderId"  value="<?php echo $UserId;?>"/>										  <input type="hidden" name="receiverId" id="receiverId"  value="1"/>                                          <i class="fa fa-paperclip attachment" aria-hidden="true"></i>                                          <button class="submit" id="chatButton"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>                                       </div>                                    </div>                                 </div>                              </div>                              <?php /*<div class="chatBox">                                 <div class="chatBody" placeholder="Reason of changing time" style="bottom:0;">                                    <div class="chatTop">                                       <div id="line_dot" class="userOnline"></div>                                       <span class="chatTitle">NIK</span>                                       <div class="chatClose">X</div>                                       <div class="chatMin"></div>                                    </div>                                    <!-------------CHAT HISTORY-------------->                                    <div class="chatLoop">                                       <div class="chatReply">                                          <div class="chatResponceCont" id="chati" style="float: left;width: 100%;">                                             <!------APPENDED CHAT LOOP--------->                                          </div>                                       </div>                                    </div>                                    <!-------------nodejs version list of chat-------------->                                    <!--<textarea id="chatText" type="text" class="chatText"></textarea>-->                                    <button id="chatSubmit">Send</button>                                 </div>                              </div>*/							  ?>							  							                             </div>                        </div>                                </div>         </div>         <!--<div class="alert alert-success alert-2" role="alert">            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        <strong>Your listing</strong> YOUR LISTING HAS BEEN APPROVED!                        </div>-->             			  </div>        </div></div>