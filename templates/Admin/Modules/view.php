<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Module $module
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Module'), ['action' => 'edit', $module->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Module'), ['action' => 'delete', $module->id], ['confirm' => __('Are you sure you want to delete # {0}?', $module->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Modules'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Module'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="modules view content">
            <h3><?= h($module->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($module->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Caption') ?></th>
                    <td><?= h($module->caption) ?></td>
                </tr>
                <tr>
                    <th><?= __('Icon') ?></th>
                    <td><?= h($module->icon) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($module->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Access Type') ?></th>
                    <td><?= $this->Number->format($module->access_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Order By') ?></th>
                    <td><?= $this->Number->format($module->order_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $module->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Module Permissions') ?></h4>
                <?php if (!empty($module->module_permissions)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Role Id') ?></th>
                            <th><?= __('Module Id') ?></th>
                            <th><?= __('Perm View') ?></th>
                            <th><?= __('Perm Insert') ?></th>
                            <th><?= __('Perm Update') ?></th>
                            <th><?= __('Perm Delete') ?></th>
                            <th><?= __('Perm Seo') ?></th>
                            <th><?= __('Perm Approve') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($module->module_permissions as $modulePermissions) : ?>
                        <tr>
                            <td><?= h($modulePermissions->id) ?></td>
                            <td><?= h($modulePermissions->role_id) ?></td>
                            <td><?= h($modulePermissions->module_id) ?></td>
                            <td><?= h($modulePermissions->perm_view) ?></td>
                            <td><?= h($modulePermissions->perm_insert) ?></td>
                            <td><?= h($modulePermissions->perm_update) ?></td>
                            <td><?= h($modulePermissions->perm_delete) ?></td>
                            <td><?= h($modulePermissions->perm_seo) ?></td>
                            <td><?= h($modulePermissions->perm_approve) ?></td>
                            <td><?= h($modulePermissions->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ModulePermissions', 'action' => 'view', $modulePermissions->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ModulePermissions', 'action' => 'edit', $modulePermissions->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ModulePermissions', 'action' => 'delete', $modulePermissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modulePermissions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
