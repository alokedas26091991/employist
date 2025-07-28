<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserDeliveryDetail $userDeliveryDetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User Delivery Detail'), ['action' => 'edit', $userDeliveryDetail->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User Delivery Detail'), ['action' => 'delete', $userDeliveryDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userDeliveryDetail->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List User Delivery Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User Delivery Detail'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userDeliveryDetails view content">
            <h3><?= h($userDeliveryDetail->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $userDeliveryDetail->has('user') ? $this->Html->link($userDeliveryDetail->user->id, ['controller' => 'Users', 'action' => 'view', $userDeliveryDetail->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($userDeliveryDetail->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Company') ?></th>
                    <td><?= h($userDeliveryDetail->company) ?></td>
                </tr>
                <tr>
                    <th><?= __('Country') ?></th>
                    <td><?= h($userDeliveryDetail->country) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($userDeliveryDetail->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($userDeliveryDetail->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userDeliveryDetail->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pin') ?></th>
                    <td><?= $userDeliveryDetail->pin === null ? '' : $this->Number->format($userDeliveryDetail->pin) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $this->Number->format($userDeliveryDetail->is_deleted) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($userDeliveryDetail->create_date) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Address1') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($userDeliveryDetail->address1)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Address2') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($userDeliveryDetail->address2)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
