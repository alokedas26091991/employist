<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cart $cart
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cart'), ['action' => 'edit', $cart->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cart'), ['action' => 'delete', $cart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cart->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Carts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cart'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="carts view content">
            <h3><?= h($cart->invoice_no) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $cart->has('user') ? $this->Html->link($cart->user->id, ['controller' => 'Users', 'action' => 'view', $cart->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Invoice No') ?></th>
                    <td><?= h($cart->invoice_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cart->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gross Amount') ?></th>
                    <td><?= $this->Number->format($cart->gross_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Net Amount') ?></th>
                    <td><?= $this->Number->format($cart->net_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tax Amount') ?></th>
                    <td><?= $this->Number->format($cart->tax_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Discount Amount') ?></th>
                    <td><?= $this->Number->format($cart->discount_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($cart->create_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $cart->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $cart->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Cart Items') ?></h4>
                <?php if (!empty($cart->cart_items)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Cart Id') ?></th>
                            <th><?= __('Gross Amount') ?></th>
                            <th><?= __('Net Amount') ?></th>
                            <th><?= __('Discount') ?></th>
                            <th><?= __('Tax Amount') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Examination Id') ?></th>
                            <th><?= __('Create Date') ?></th>
                            <th><?= __('Is Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($cart->cart_items as $cartItems) : ?>
                        <tr>
                            <td><?= h($cartItems->id) ?></td>
                            <td><?= h($cartItems->cart_id) ?></td>
                            <td><?= h($cartItems->gross_amount) ?></td>
                            <td><?= h($cartItems->net_amount) ?></td>
                            <td><?= h($cartItems->discount) ?></td>
                            <td><?= h($cartItems->tax_amount) ?></td>
                            <td><?= h($cartItems->product_id) ?></td>
                            <td><?= h($cartItems->examination_id) ?></td>
                            <td><?= h($cartItems->create_date) ?></td>
                            <td><?= h($cartItems->is_deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'CartItems', 'action' => 'view', $cartItems->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'CartItems', 'action' => 'edit', $cartItems->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'CartItems', 'action' => 'delete', $cartItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cartItems->id)]) ?>
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
