<div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Review List <small></small></h2>
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
											<th><?= $this->Paginator->sort('date') ?></th>
											<th><?= $this->Paginator->sort('paper name') ?></th>
											<th><?= $this->Paginator->sort('User') ?></th>
											<th><?= $this->Paginator->sort('rating') ?></th>
											<th><?= $this->Paginator->sort('comment') ?></th>
										    <th><?= $this->Paginator->sort('status') ?></th>
											<th class="actions"><?= __('Actions') ?></th>
										</tr>
                                        </thead>
                                        <tbody>
                <?php 
				$k=0;
				foreach ($review as $module):
				$k++;
				?>
                <tr>
                     <td><?= $k ?></td>
					 <td><?= $module->dt??"" ?></td>
                    <td><?= $module->examination->name??"" ?></td>
                    <td><?= $module->user->name??"" ?></td>
                    <td><?= $module->rating??"" ?></td>
					<td><?= $module->comment??"" ?></td>
                 <td><?= $module->is_active==1?"Active":"Inactive" ?></td>
                 
                    <td class="actions">
                     
                      



                        <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $module->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'deletedata', $module->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
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


