<div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Module <small></small></h2>
                                 </div>
                                 <div>

                                 <?= $this->Html->link(__('New Module'), ['action' => 'add'], ['class' => 'btn btn-success button float-right']) ?>

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
											<th><?= $this->Paginator->sort('name') ?></th>
											<th><?= $this->Paginator->sort('caption') ?></th>
											<th><?= $this->Paginator->sort('access_type') ?></th>
											<th><?= $this->Paginator->sort('order_by') ?></th>
											<th><?= $this->Paginator->sort('icon') ?></th>
											
											<th class="actions"><?= __('Actions') ?></th>
										</tr>
                                        </thead>
                                        <tbody>
                <?php foreach ($modules as $module): ?>
                <tr>
                     <td><?= $this->Number->format($module->id) ?></td>
                    <td><?= h($module->name) ?></td>
                    <td><?= h($module->caption) ?></td>
                    <td><?= $this->Number->format($module->access_type) ?></td>
                    <td><?= $this->Number->format($module->order_by) ?></td>
                    <td><?= h($module->icon) ?></td>
                 
                 
                    <td class="actions">
                     
                      



                        <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $module->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
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






