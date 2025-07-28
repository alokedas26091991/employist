<div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Paper List <small></small></h2>
                                 </div>
                                 <div>

                                 <?= $this->Html->link(__('New Paper'), ['action' => 'add'], ['class' => 'btn btn-success button float-right']) ?>

                                    </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <table class="table table-striped projects">
                                          <thead class="thead-dark">
                                           <tr>
											<th><?= $this->Paginator->sort('id') ?></th>
											<th><?= $this->Paginator->sort('paper name') ?></th>
											<th><?= $this->Paginator->sort('caption') ?></th>
											<th><?= $this->Paginator->sort('examination_category_id') ?></th>
                                 <th><?= $this->Paginator->sort('Order') ?></th>
											<th><?= $this->Paginator->sort('photo') ?></th>
											<th><?= $this->Paginator->sort('status') ?></th>
											<th><?= $this->Paginator->sort('show_in_site') ?></th>
											<th><?= $this->Paginator->sort('available question') ?></th>
										
											<th class="actions"><?= __('Actions') ?></th>
										</tr>
                                        </thead>
                                        <tbody>
                <?php 
				$k=0;
				foreach ($examinations as $module):
				$k++;
				?>
                <tr>
                     <td><?= $k ?></td>
                    <td><?= $module->name ?></td>
                    <td><?= $module->caption ?></td>
                    <td><?= $module->has('examination_category') ? $this->Html->link($module->examination_category->name, ['controller' => 'ExaminationCategories', 'action' => 'view', $module->examination_category->id]) : '' ?></td>
                    <td><?= $module->ord ?></td>
                    <td>
                        <?php
                        if($module->pic)
                        {
                        ?>
				<a href="<?php echo $this->Url->image("paper/$module->pic", ['pathPrefix' => '']) ?>"><img src="<?php echo $this->Url->image("paper/$module->pic", ['pathPrefix' => '']) ?>" style="height:100px;width:100px;" /></a>
				<?php
                }
                else
                {
                    echo "No Image";
                }
                ?>
				</td>
                 <td><?= $module->is_active==1?"Active":"Inactive" ?></td>
                 <td><?= $module->show_in_site==1?"Yes":"No" ?></td>
               
                 <td><?= count($module->examination_questions)-count($module->examination_mock_test_questions) ?></td>
                 
                    <td class="actions">
                     
                      



                        <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $module->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                        
                        <!--<?= $this->Html->link('<span class="fa fa-archive"></span><span class="sr-only">' . __('View Question') . '</span>', ['action' => 'questionlist', $module->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('View Question')]) ?>-->
                        
                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $module->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
                    
                    
                    
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


