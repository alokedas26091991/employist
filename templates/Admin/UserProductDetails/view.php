<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserProductDetail $userProductDetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User Product Detail'), ['action' => 'edit', $userProductDetail->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User Product Detail'), ['action' => 'delete', $userProductDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userProductDetail->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List User Product Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User Product Detail'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userProductDetails view content">
            <h3><?= h($userProductDetail->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $userProductDetail->has('user') ? $this->Html->link($userProductDetail->user->id, ['controller' => 'Users', 'action' => 'view', $userProductDetail->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User Product') ?></th>
                    <td><?= $userProductDetail->has('user_product') ? $this->Html->link($userProductDetail->user_product->id, ['controller' => 'UserProducts', 'action' => 'view', $userProductDetail->user_product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Examination') ?></th>
                    <td><?= $userProductDetail->has('examination') ? $this->Html->link($userProductDetail->examination->name, ['controller' => 'Examinations', 'action' => 'view', $userProductDetail->examination->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Mock Test') ?></th>
                    <td><?= $userProductDetail->has('mock_test') ? $this->Html->link($userProductDetail->mock_test->name, ['controller' => 'MockTests', 'action' => 'view', $userProductDetail->mock_test->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userProductDetail->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($userProductDetail->create_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $userProductDetail->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
