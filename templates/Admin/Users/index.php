<div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>User List<small></small></h2>
                                 </div>
                                 <div>

                                 <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'btn btn-success button float-right']) ?>

                                    </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
								
                                    <div class="col-lg-12">
									 <?=$this->element('search');?></br>
                                       <div class="table-responsive-sm">
									   
                                          <table class="table table-striped projects">
                                          <thead class="thead-dark">
                                            <tr>
												<th>#</th>
												<th>Name</th>
												<th>Email</th>
												<th>Phone</th>
												<th>User Type</th>
												<th>Photo</th>
											    <th>Status</th>
												<th>Action</th>
											 
											</tr>
                                        </thead>
									<tbody>
                                <?php

								$k=0;
								foreach ($users as $user): 
                                $k++;
								
								if($user->user_type==1)
								{
									$a="Admin";
								}
								else if($user->user_type==2)
								{
									$a="Customer";
								}
								else if($user->user_type==3)
								{
									$a="Staff";
								}
								else if($user->user_type==4)
								{
									$a="Manager [HR Module]";
								}
                                else if($user->user_type==5)
								{
									$a="Employee [HR Module]";
								}
                                
                                ?>
                                <tr>
                                 
                                    <td><?= $k ?></td>
                                    <td><?= h($user->name) ?></td>
                                    <td><?= h($user->email) ?></td>
                                    <td><?= h($user->phone_no) ?></td>
                                    <td><?= $a ?></td>
                                      <td>
									  <?php
									  if($user->image)
									  {?>
									  <img src="/user/<?=$user->image?>" height="100" width="100"/>
									  <?php
									  }
									  else
									  {
										  echo "No Image";
									  }
									  ?>
									  </td>
									  <td><?= $user->is_active==1?"Active":"Inactive" ?></td>
                                  
               
              <td class="actions">
			  <?php if($this->request->getSession()->read('Auth.User.id')==1){?>
			
					<?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $user->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
					
					<?= $this->Html->link('<span class="fa fa-child"></span><span class="sr-only">
                     </span>', ['action' => 'role', $user->id], ['escape' => false, 'class' => 'success p-0', 'title' => __('Add Module Permission')]) ?>
			 <?php 
			  }
			  ?>
					<?= $this->Html->link('<span class="fa fa-eye-slash"></span>', ['action' => 'changepassword', $user->id], ['escape' => false, 'class' => 'info p-0', 'title' => __('Change Password')]) ?>
					
             </td>
			 
			

                                   
                                </tr>
                                
        <?php endforeach; ?>
                                
                            </tbody>
                                          </table>
                                         
                                          
                                        

                                       </div>
									       <div class="paginator">
											<ul class="pagination">
												<?= $this->Paginator->first('<< ' . __('first')) ?>
												<?= $this->Paginator->prev('< ' . __('previous')) ?>
												<?= $this->Paginator->numbers() ?>
												<?= $this->Paginator->next(__('next') . ' >') ?>
												<?= $this->Paginator->last(__('last') . ' >>') ?>
											</ul>
											<p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
										</div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end row -->
                     </div>






















        