<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Subscription> $subscriptions
 */
?>
<div class="subscriptions index content">
    <?= $this->Html->link(__('New Subscription'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Subscriptions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('slug') ?></th>
                    <th><?= $this->Paginator->sort('duration') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('is_active') ?></th>
                    <th><?= $this->Paginator->sort('create_date') ?></th>
                    <th><?= $this->Paginator->sort('is_deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($subscriptions as $subscription): ?>
                <tr>
                    <td><?= $this->Number->format($subscription->id) ?></td>
                    <td><?= h($subscription->name) ?></td>
                    <td><?= h($subscription->slug) ?></td>
                    <td><?= $this->Number->format($subscription->duration) ?></td>
                    <td><?= $this->Number->format($subscription->price) ?></td>
                    <td><?= h($subscription->is_active) ?></td>
                    <td><?= h($subscription->create_date) ?></td>
                    <td><?= h($subscription->is_deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $subscription->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $subscription->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $subscription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subscription->id)]) ?>
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
