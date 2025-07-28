
<div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                       
                        <div class="right_topbar">
                           <div class="icon_info">
                              
                              <ul class="user_profile_dd">
                                 <li>
								 <?php
								 if($this->request->getSession()->read('Auth.User.image'))
								 {
								 ?>
                                    <a class="dropdown-toggle" data-toggle="dropdown">
									<img src="/user/<?=$this->request->getSession()->read('Auth.User.image')?>" class="img-responsive rounded-circle" />
									
									<span class="name_user"><?=$this->request->getSession()->read('Auth.User.name')?></span>
									</a>
								<?php
								 }
								 else
								 {
								 ?>
								 <a class="dropdown-toggle" data-toggle="dropdown">
									<?=$this->Html->image('admin_template/images/layout_img/user_img.jpg',['pathPrefix' => '','class'=>'img-responsive rounded-circle'])?>
									<span class="name_user"><?=$this->request->getSession()->read('Auth.User.name')?></span>
									</a>
								<?php
								 }
								?>								 
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="/admin/users/edit/<?=$this->request->getSession()->read('Auth.User.id')?>">My Profile</a>
                                       <a class="dropdown-item" href="/admin/users/changepassword/<?=$this->request->getSession()->read('Auth.User.id')?>">Settings</a>
                                    
                                       <a class="dropdown-item" href="/admin/users/logout"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>