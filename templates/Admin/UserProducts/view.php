<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserProduct $userProduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User Product'), ['action' => 'edit', $userProduct->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User Product'), ['action' => 'delete', $userProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userProduct->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List User Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userProducts view content">
            <h3><?= h($userProduct->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $userProduct->has('user') ? $this->Html->link($userProduct->user->id, ['controller' => 'Users', 'action' => 'view', $userProduct->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $userProduct->has('product') ? $this->Html->link($userProduct->product->name, ['controller' => 'Products', 'action' => 'view', $userProduct->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Examination') ?></th>
                    <td><?= $userProduct->has('examination') ? $this->Html->link($userProduct->examination->name, ['controller' => 'Examinations', 'action' => 'view', $userProduct->examination->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userProduct->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Invoice Id') ?></th>
                    <td><?= $this->Number->format($userProduct->invoice_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= $this->Number->format($userProduct->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Date') ?></th>
                    <td><?= h($userProduct->start_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Date') ?></th>
                    <td><?= h($userProduct->end_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($userProduct->create_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $userProduct->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related User Product Details') ?></h4>
                <?php if (!empty($userProduct->user_product_details)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('User Product Id') ?></th>
                            <th><?= __('Examination Id') ?></th>
                            <th><?= __('Mock Test Id') ?></th>
                            <th><?= __('Create Date') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($userProduct->user_product_details as $userProductDetails) : ?>
                        <tr>
                            <td><?= h($userProductDetails->id) ?></td>
                            <td><?= h($userProductDetails->user_id) ?></td>
                            <td><?= h($userProductDetails->user_product_id) ?></td>
                            <td><?= h($userProductDetails->examination_id) ?></td>
                            <td><?= h($userProductDetails->mock_test_id) ?></td>
                            <td><?= h($userProductDetails->create_date) ?></td>
                            <td><?= h($userProductDetails->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'UserProductDetails', 'action' => 'view', $userProductDetails->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'UserProductDetails', 'action' => 'edit', $userProductDetails->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserProductDetails', 'action' => 'delete', $userProductDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userProductDetails->id)]) ?>
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
