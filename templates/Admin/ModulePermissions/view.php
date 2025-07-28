<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ModulePermission $modulePermission
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Module Permission'), ['action' => 'edit', $modulePermission->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Module Permission'), ['action' => 'delete', $modulePermission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modulePermission->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Module Permissions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Module Permission'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="modulePermissions view content">
            <h3><?= h($modulePermission->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $modulePermission->has('role') ? $this->Html->link($modulePermission->role->role_name, ['controller' => 'Roles', 'action' => 'view', $modulePermission->role->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Module') ?></th>
                    <td><?= $modulePermission->has('module') ? $this->Html->link($modulePermission->module->name, ['controller' => 'Modules', 'action' => 'view', $modulePermission->module->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($modulePermission->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm View') ?></th>
                    <td><?= $modulePermission->perm_view ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Insert') ?></th>
                    <td><?= $modulePermission->perm_insert ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Update') ?></th>
                    <td><?= $modulePermission->perm_update ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Delete') ?></th>
                    <td><?= $modulePermission->perm_delete ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Seo') ?></th>
                    <td><?= $modulePermission->perm_seo ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Approve') ?></th>
                    <td><?= $modulePermission->perm_approve ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $modulePermission->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
