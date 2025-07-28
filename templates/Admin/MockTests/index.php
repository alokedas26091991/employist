<div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Mock Test <small></small></h2>
                                 </div>
                                 <div>

                                 <?= $this->Html->link(__('New Mock Test'), ['action' => 'add'], ['class' => 'btn btn-success button float-right']) ?>

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
											<th><?= $this->Paginator->sort('paper') ?></th>
											<th><?= $this->Paginator->sort('name') ?></th>
											<th><?= $this->Paginator->sort('no_of_question') ?></th>
											<th><?= $this->Paginator->sort('time_alloted') ?></th>
											<th><?= $this->Paginator->sort('status') ?></th>
											<th><?= $this->Paginator->sort('is_demo') ?></th>
											
											<th class="actions"><?= __('Actions') ?></th>
										</tr>
                                        </thead>
                                     
			            <tbody>
                <?php 
				$k=0;
				foreach ($mockTests as $mockTest): 
				$k++;
				?>
                <tr>
                    <td><?= $k ?></td>
                   

                    <td><?= $mockTest->has('examination') ? $this->Html->link($mockTest->examination->name, ['controller' => 'Examinations', 'action' => 'view', $mockTest->examination->id]) : '' ?></td>
                    <td><?= h($mockTest->name) ?></td>
                    <td><?= h($mockTest->question_no) ?></td>
					 <td><?= h($mockTest->time_alloted) ?></td>
                    <td><?= $mockTest->is_active==1?"Active":"Inactive" ?></td>
                    <td><?= $mockTest->is_demo==1?"Yes":"No" ?></td>
              
                    <td class="actions">
                         <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $mockTest->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $mockTest->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
                    <?= $this->Html->link('<span class="fa fa-pencil"></span><span class="sr-only">' . __('Question list') . '</span>', ['action' => 'question', $mockTest->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Question list')]) ?>
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


