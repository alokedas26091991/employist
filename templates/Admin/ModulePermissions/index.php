<div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Module Permission <small></small></h2>
                                 </div>
                                 <div>

                                 <?= $this->Html->link(__('New Module Permission'), ['action' => 'add'], ['class' => 'btn btn-success button float-right']) ?>

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
                                                <th><?= $this->Paginator->sort('role_id') ?></th>
                                                <th><?= $this->Paginator->sort('module_id') ?></th>
                                                <th><?= $this->Paginator->sort('view') ?></th>
                                                <th><?= $this->Paginator->sort('insert') ?></th>
                                                <th><?= $this->Paginator->sort('update') ?></th>
                                                <th><?= $this->Paginator->sort('delete') ?></th>
                                              
                                               
                                                <th class="actions"><?= __('Actions') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                <?php foreach ($modulePermissions as $modulePermission): ?>
                <tr>
                    <td><?= $this->Number->format($modulePermission->id) ?></td>
                    <td><?= $modulePermission->has('role') ? $this->Html->link($modulePermission->role->role_name, ['controller' => 'Roles', 'action' => 'view', $modulePermission->role->id]) : '' ?></td>
                    <td><?= $modulePermission->has('module') ? $this->Html->link($modulePermission->module->caption, ['controller' => 'Modules', 'action' => 'view', $modulePermission->module->id]) : '' ?></td>
                    <td><?= h($modulePermission->perm_view) ?></td>
                    <td><?= h($modulePermission->perm_insert) ?></td>
                    <td><?= h($modulePermission->perm_update) ?></td>
                    <td><?= h($modulePermission->perm_delete) ?></td>
                 
                 
                    <td class="actions">
                     
                      



                        <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $modulePermission->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $modulePermission->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
                                          </table>
                                         
                                          <nav aria-label="Page navigation mb-3">
                                        <div class="paginator">
                                            <ul class="pagination">
                                                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                                <?= $this->Paginator->numbers() ?>
                                                <?= $this->Paginator->next(__('next') . ' >') ?>
                                            </ul>
                                            <p><?= $this->Paginator->counter() ?></p>
                                        </div></nav>
                                        

                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end row -->
                     </div>
