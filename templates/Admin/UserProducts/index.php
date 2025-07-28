<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UserProduct> $userProducts
 */
?>
<div class="userProducts index content">
    <?= $this->Html->link(__('New User Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('User Products') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('invoice_id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('exam_id') ?></th>
                    <th><?= $this->Paginator->sort('start_date') ?></th>
                    <th><?= $this->Paginator->sort('end_date') ?></th>
                    <th><?= $this->Paginator->sort('create_date') ?></th>
                    <th><?= $this->Paginator->sort('created_by') ?></th>
                    <th><?= $this->Paginator->sort('is_deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userProducts as $userProduct): ?>
                <tr>
                    <td><?= $this->Number->format($userProduct->id) ?></td>
                    <td><?= $userProduct->has('user') ? $this->Html->link($userProduct->user->id, ['controller' => 'Users', 'action' => 'view', $userProduct->user->id]) : '' ?></td>
                    <td><?= $this->Number->format($userProduct->invoice_id) ?></td>
                    <td><?= $userProduct->has('product') ? $this->Html->link($userProduct->product->name, ['controller' => 'Products', 'action' => 'view', $userProduct->product->id]) : '' ?></td>
                    <td><?= $userProduct->has('examination') ? $this->Html->link($userProduct->examination->name, ['controller' => 'Examinations', 'action' => 'view', $userProduct->examination->id]) : '' ?></td>
                    <td><?= h($userProduct->start_date) ?></td>
                    <td><?= h($userProduct->end_date) ?></td>
                    <td><?= h($userProduct->create_date) ?></td>
                    <td><?= $this->Number->format($userProduct->created_by) ?></td>
                    <td><?= h($userProduct->is_deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $userProduct->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userProduct->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userProduct->id)]) ?>
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
