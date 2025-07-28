<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UserDeliveryDetail> $userDeliveryDetails
 */
?>
<div class="userDeliveryDetails index content">
    <?= $this->Html->link(__('New User Delivery Detail'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('User Delivery Details') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('company') ?></th>
                    <th><?= $this->Paginator->sort('country') ?></th>
                    <th><?= $this->Paginator->sort('state') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('pin') ?></th>
                    <th><?= $this->Paginator->sort('create_date') ?></th>
                    <th><?= $this->Paginator->sort('is_deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userDeliveryDetails as $userDeliveryDetail): ?>
                <tr>
                    <td><?= $this->Number->format($userDeliveryDetail->id) ?></td>
                    <td><?= $userDeliveryDetail->has('user') ? $this->Html->link($userDeliveryDetail->user->id, ['controller' => 'Users', 'action' => 'view', $userDeliveryDetail->user->id]) : '' ?></td>
                    <td><?= h($userDeliveryDetail->name) ?></td>
                    <td><?= h($userDeliveryDetail->company) ?></td>
                    <td><?= h($userDeliveryDetail->country) ?></td>
                    <td><?= h($userDeliveryDetail->state) ?></td>
                    <td><?= h($userDeliveryDetail->city) ?></td>
                    <td><?= $userDeliveryDetail->pin === null ? '' : $this->Number->format($userDeliveryDetail->pin) ?></td>
                    <td><?= h($userDeliveryDetail->create_date) ?></td>
                    <td><?= $this->Number->format($userDeliveryDetail->is_deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $userDeliveryDetail->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userDeliveryDetail->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userDeliveryDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userDeliveryDetail->id)]) ?>
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
