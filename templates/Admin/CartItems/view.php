<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CartItem $cartItem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cart Item'), ['action' => 'edit', $cartItem->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cart Item'), ['action' => 'delete', $cartItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cartItem->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cart Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cart Item'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cartItems view content">
            <h3><?= h($cartItem->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cart') ?></th>
                    <td><?= $cartItem->has('cart') ? $this->Html->link($cartItem->cart->invoice_no, ['controller' => 'Carts', 'action' => 'view', $cartItem->cart->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $cartItem->has('product') ? $this->Html->link($cartItem->product->name, ['controller' => 'Products', 'action' => 'view', $cartItem->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Examination') ?></th>
                    <td><?= $cartItem->has('examination') ? $this->Html->link($cartItem->examination->name, ['controller' => 'Examinations', 'action' => 'view', $cartItem->examination->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cartItem->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gross Amount') ?></th>
                    <td><?= $this->Number->format($cartItem->gross_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Net Amount') ?></th>
                    <td><?= $this->Number->format($cartItem->net_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Discount') ?></th>
                    <td><?= $this->Number->format($cartItem->discount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tax Amount') ?></th>
                    <td><?= $this->Number->format($cartItem->tax_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($cartItem->create_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $cartItem->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
