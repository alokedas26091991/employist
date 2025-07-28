<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\CartItem> $cartItems
 */
?>
<div class="cartItems index content">
    <?= $this->Html->link(__('New Cart Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cart Items') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('cart_id') ?></th>
                    <th><?= $this->Paginator->sort('gross_amount') ?></th>
                    <th><?= $this->Paginator->sort('net_amount') ?></th>
                    <th><?= $this->Paginator->sort('discount') ?></th>
                    <th><?= $this->Paginator->sort('tax_amount') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('examination_id') ?></th>
                    <th><?= $this->Paginator->sort('create_date') ?></th>
                    <th><?= $this->Paginator->sort('is_deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartItems as $cartItem): ?>
                <tr>
                    <td><?= $this->Number->format($cartItem->id) ?></td>
                    <td><?= $cartItem->has('cart') ? $this->Html->link($cartItem->cart->invoice_no, ['controller' => 'Carts', 'action' => 'view', $cartItem->cart->id]) : '' ?></td>
                    <td><?= $this->Number->format($cartItem->gross_amount) ?></td>
                    <td><?= $this->Number->format($cartItem->net_amount) ?></td>
                    <td><?= $this->Number->format($cartItem->discount) ?></td>
                    <td><?= $this->Number->format($cartItem->tax_amount) ?></td>
                    <td><?= $cartItem->has('product') ? $this->Html->link($cartItem->product->name, ['controller' => 'Products', 'action' => 'view', $cartItem->product->id]) : '' ?></td>
                    <td><?= $cartItem->has('examination') ? $this->Html->link($cartItem->examination->name, ['controller' => 'Examinations', 'action' => 'view', $cartItem->examination->id]) : '' ?></td>
                    <td><?= h($cartItem->create_date) ?></td>
                    <td><?= h($cartItem->is_deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cartItem->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cartItem->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cartItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cartItem->id)]) ?>
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
