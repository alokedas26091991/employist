<div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Package List <small></small></h2>
                                 </div>
                                 <div>

                                 <?= $this->Html->link(__('New Package'), ['action' => 'add'], ['class' => 'btn btn-success button float-right']) ?>

                                    </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <table class="table table-striped projects">
                                          <thead class="thead-dark">
                                           <tr>
											<th><?= $this->Paginator->sort('sl no') ?></th>
											<th><?= $this->Paginator->sort('package_type') ?></th>
											<th><?= $this->Paginator->sort('name') ?></th>
											<th><?= $this->Paginator->sort('mock test') ?></th>
											<th><?= $this->Paginator->sort('validity') ?></th>
											<th><?= $this->Paginator->sort('price') ?></th>
											<th><?= $this->Paginator->sort('status') ?></th>
											<th class="actions"><?= __('Actions') ?></th>
										</tr>
                                        </thead>
                                        <tbody>
                <?php 
				$k=0;
				foreach ($products as $module):
				$k++;
				?>
                <tr>
                     <td><?= $k ?></td>
                     <td><?= $module->examination_category->name ?></td>
                    <td><?= $module->name ?></td>
                    <td><?= $module->no_mock_test ?></td>
                     <td><?= $module->valid_days ?></td>
					  <td><?= $module->price ?></td>
				
                 <td><?= $module->is_active==1?"Active":"Inactive" ?></td>
                 
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






