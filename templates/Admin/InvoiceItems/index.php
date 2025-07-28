<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\InvoiceItem> $invoiceItems
 */
?>
<div class="invoiceItems index content">
    <?= $this->Html->link(__('New Invoice Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Invoice Items') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('invoice_id') ?></th>
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
                <?php foreach ($invoiceItems as $invoiceItem): ?>
                <tr>
                    <td><?= $this->Number->format($invoiceItem->id) ?></td>
                    <td><?= $invoiceItem->has('invoice') ? $this->Html->link($invoiceItem->invoice->invoice_no, ['controller' => 'Invoices', 'action' => 'view', $invoiceItem->invoice->id]) : '' ?></td>
                    <td><?= $this->Number->format($invoiceItem->gross_amount) ?></td>
                    <td><?= $this->Number->format($invoiceItem->net_amount) ?></td>
                    <td><?= $this->Number->format($invoiceItem->discount) ?></td>
                    <td><?= $this->Number->format($invoiceItem->tax_amount) ?></td>
                    <td><?= $invoiceItem->has('product') ? $this->Html->link($invoiceItem->product->name, ['controller' => 'Products', 'action' => 'view', $invoiceItem->product->id]) : '' ?></td>
                    <td><?= $invoiceItem->has('examination') ? $this->Html->link($invoiceItem->examination->name, ['controller' => 'Examinations', 'action' => 'view', $invoiceItem->examination->id]) : '' ?></td>
                    <td><?= h($invoiceItem->create_date) ?></td>
                    <td><?= h($invoiceItem->is_deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $invoiceItem->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $invoiceItem->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $invoiceItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceItem->id)]) ?>
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
