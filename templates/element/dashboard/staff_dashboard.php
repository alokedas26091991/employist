  <?php
  use Cake\ORM\TableRegistry;
  $user = TableRegistry::getTableLocator()->get('Users');
  ?>
  
  <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Dashboard</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                        <!-- table section -->
                        <div class="col-md-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Question Uploaded Count</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table table-bordered">
                                       <thead>
                                          <tr>
                                             <th>Name</th>
                                             <th>Today</th>
                                             <th>Till Date</th>
                                          </tr>
                                       </thead>
                                       <tbody>
									       <?php foreach ($userEntries as $userEntryCount): ?>
        <tr>
            <td><?= $userEntryCount->user->name ?></td>
            <td><?= h($userEntryCount->today_entries ?? 0) ?></td>
            <td><?= h($userEntryCount->totalcount ?? 0) ?></td>
        </tr>
    <?php endforeach; ?>										
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
						
						<div class="col-md-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Questions Forwarded To Supervisor</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table table-bordered">
                                       <thead>
                                          <tr>
                                             <th>Name</th>
                                             <th>Today</th>
                                             <th>Till Date</th>
                                          </tr>
                                       </thead>
                                       <tbody>
									       <?php foreach ($supervisor as $supervisor): 
										   
										   $username=$user->find()->where(['id'=>$supervisor->supervisor])->first();
										   
										   ?>
											<tr>
												<td><?= $username->name ?></td>
												<td><?= h($supervisor->today_entries ?? 0) ?></td>
												<td><?= h($supervisor->totalcount ?? 0) ?></td>
											</tr>
										<?php endforeach; ?>										
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- table section -->
                        <div class="col-md-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Questions Forwarded To Reviewers</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th>Name</th>
                                             <th>Today</th>
                                             <th>Till Date</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                  <?php foreach ($reviewer as $reviewer):

										$username1=$user->find()->where(['id'=>$reviewer->reviewer])->first();
								  ?>
									<tr>
										<td><?= $username1->name ?></td>
										<td><?= h($reviewer->today_entries ?? 0) ?></td>
										<td><?= h($reviewer->totalcount ?? 0) ?></td>
									</tr>
								<?php endforeach; ?>
                                          
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- table section -->
                        <div class="col-md-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Questions Forwarded To Super Reviewers</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table table-bordered">
                                       <thead>
                                          <tr>
                                             <th>Name</th>
                                             <th>Today</th>
                                             <th>Till Date</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                    <?php foreach ($superreviewer as $reviewer):
						
									$username2=$user->find()->where(['id'=>$reviewer->super_reviewer])->first();	
									?>
									<tr>
										<td><?= $username2->name ?></td>
										<td><?= h($reviewer->today_entries ?? 0) ?></td>
										<td><?= h($reviewer->totalcount ?? 0) ?></td>
									</tr>
								<?php endforeach; ?>
                                          
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
						
						<div class="col-md-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Questions Forwarded To Manager</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table table-bordered">
                                       <thead>
                                          <tr>
                                             <th>Name</th>
                                             <th>Today</th>
                                             <th>Till Date</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                    <?php foreach ($manager as $reviewer):
						
									$username3=$user->find()->where(['id'=>$reviewer->manager])->first();	
									?>
									<tr>
										<td><?= $username3->name ?></td>
										<td><?= h($reviewer->today_entries ?? 0) ?></td>
										<td><?= h($reviewer->totalcount ?? 0) ?></td>
									</tr>
								<?php endforeach; ?>
                                          
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- table section -->
                        <div class="col-md-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>User Activity</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table table-hover">
                                       <thead>
                                          <tr>
                                             <th>Name</th>
                                             <th>Time elapesd since last seen</th>
                                            
                                          </tr>
                                       </thead>
                                       <tbody>
									   <?php foreach ($user_time as $user_time):
									   
									   if($user_time->is_login==1)
									   {
										   $color="green";
									   }
									   else
									   {
										   $color="red";
									   }
									   
									   ?>
                                          <tr style="color:<?=$color?>;font-weight: bold;">
                                             <td><?=$user_time->user->name?></td>
                                             <td><?=gmdate("H:i:s", $user_time->total_time);?></td>
                                             
                                          </tr>
                                        <?php endforeach; ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- table section -->
                      
                      
                       
                     
                     </div>
                  </div>
               