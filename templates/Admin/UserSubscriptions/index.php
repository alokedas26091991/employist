<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UserSubscription> $userSubscriptions
 */
?>
<div class="userSubscriptions index content">
    <?= $this->Html->link(__('New User Subscription'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('User Subscriptions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('subscription_id') ?></th>
                    <th><?= $this->Paginator->sort('start_date') ?></th>
                    <th><?= $this->Paginator->sort('end_date') ?></th>
                    <th><?= $this->Paginator->sort('create_date') ?></th>
                    <th><?= $this->Paginator->sort('is_active') ?></th>
                    <th><?= $this->Paginator->sort('is_deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userSubscriptions as $userSubscription): ?>
                <tr>
                    <td><?= $this->Number->format($userSubscription->id) ?></td>
                    <td><?= $userSubscription->has('user') ? $this->Html->link($userSubscription->user->name, ['controller' => 'Users', 'action' => 'view', $userSubscription->user->id]) : '' ?></td>
                    <td><?= $userSubscription->has('subscription') ? $this->Html->link($userSubscription->subscription->name, ['controller' => 'Subscriptions', 'action' => 'view', $userSubscription->subscription->id]) : '' ?></td>
                    <td><?= h($userSubscription->start_date) ?></td>
                    <td><?= h($userSubscription->end_date) ?></td>
                    <td><?= h($userSubscription->create_date) ?></td>
                    <td><?= h($userSubscription->is_active) ?></td>
                    <td><?= h($userSubscription->is_deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $userSubscription->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userSubscription->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userSubscription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSubscription->id)]) ?>
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
