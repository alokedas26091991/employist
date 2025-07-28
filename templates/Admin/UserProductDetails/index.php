<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UserProductDetail> $userProductDetails
 */
?>
<div class="userProductDetails index content">
    <?= $this->Html->link(__('New User Product Detail'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('User Product Details') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('user_product_id') ?></th>
                    <th><?= $this->Paginator->sort('examination_id') ?></th>
                    <th><?= $this->Paginator->sort('mock_test_id') ?></th>
                    <th><?= $this->Paginator->sort('create_date') ?></th>
                    <th><?= $this->Paginator->sort('is_deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userProductDetails as $userProductDetail): ?>
                <tr>
                    <td><?= $this->Number->format($userProductDetail->id) ?></td>
                    <td><?= $userProductDetail->has('user') ? $this->Html->link($userProductDetail->user->id, ['controller' => 'Users', 'action' => 'view', $userProductDetail->user->id]) : '' ?></td>
                    <td><?= $userProductDetail->has('user_product') ? $this->Html->link($userProductDetail->user_product->id, ['controller' => 'UserProducts', 'action' => 'view', $userProductDetail->user_product->id]) : '' ?></td>
                    <td><?= $userProductDetail->has('examination') ? $this->Html->link($userProductDetail->examination->name, ['controller' => 'Examinations', 'action' => 'view', $userProductDetail->examination->id]) : '' ?></td>
                    <td><?= $userProductDetail->has('mock_test') ? $this->Html->link($userProductDetail->mock_test->name, ['controller' => 'MockTests', 'action' => 'view', $userProductDetail->mock_test->id]) : '' ?></td>
                    <td><?= h($userProductDetail->create_date) ?></td>
                    <td><?= h($userProductDetail->is_deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $userProductDetail->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userProductDetail->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userProductDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userProductDetail->id)]) ?>
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
