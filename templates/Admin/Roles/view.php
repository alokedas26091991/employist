<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Role'), ['action' => 'edit', $role->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Role'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Roles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Role'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="roles view content">
            <h3><?= h($role->role_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Role Name') ?></th>
                    <td><?= h($role->role_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($role->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $role->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Module Permissions') ?></h4>
                <?php if (!empty($role->module_permissions)) : ?>
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
                        <?php foreach ($role->module_permissions as $modulePermissions) : ?>
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
            <div class="related">
                <h4><?= __('Related User Roles') ?></h4>
                <?php if (!empty($role->user_roles)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Role Id') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($role->user_roles as $userRoles) : ?>
                        <tr>
                            <td><?= h($userRoles->id) ?></td>
                            <td><?= h($userRoles->user_id) ?></td>
                            <td><?= h($userRoles->role_id) ?></td>
                            <td><?= h($userRoles->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'UserRoles', 'action' => 'view', $userRoles->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'UserRoles', 'action' => 'edit', $userRoles->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserRoles', 'action' => 'delete', $userRoles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userRoles->id)]) ?>
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
