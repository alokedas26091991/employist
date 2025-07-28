<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSubscription $userSubscription
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User Subscription'), ['action' => 'edit', $userSubscription->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User Subscription'), ['action' => 'delete', $userSubscription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSubscription->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List User Subscriptions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User Subscription'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userSubscriptions view content">
            <h3><?= h($userSubscription->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $userSubscription->has('user') ? $this->Html->link($userSubscription->user->name, ['controller' => 'Users', 'action' => 'view', $userSubscription->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Subscription') ?></th>
                    <td><?= $userSubscription->has('subscription') ? $this->Html->link($userSubscription->subscription->name, ['controller' => 'Subscriptions', 'action' => 'view', $userSubscription->subscription->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userSubscription->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Date') ?></th>
                    <td><?= h($userSubscription->start_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Date') ?></th>
                    <td><?= h($userSubscription->end_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($userSubscription->create_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $userSubscription->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $userSubscription->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
