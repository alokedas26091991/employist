<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvoiceItem $invoiceItem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Invoice Item'), ['action' => 'edit', $invoiceItem->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Invoice Item'), ['action' => 'delete', $invoiceItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceItem->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Invoice Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Invoice Item'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="invoiceItems view content">
            <h3><?= h($invoiceItem->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Invoice') ?></th>
                    <td><?= $invoiceItem->has('invoice') ? $this->Html->link($invoiceItem->invoice->invoice_no, ['controller' => 'Invoices', 'action' => 'view', $invoiceItem->invoice->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $invoiceItem->has('product') ? $this->Html->link($invoiceItem->product->name, ['controller' => 'Products', 'action' => 'view', $invoiceItem->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Examination') ?></th>
                    <td><?= $invoiceItem->has('examination') ? $this->Html->link($invoiceItem->examination->name, ['controller' => 'Examinations', 'action' => 'view', $invoiceItem->examination->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($invoiceItem->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gross Amount') ?></th>
                    <td><?= $this->Number->format($invoiceItem->gross_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Net Amount') ?></th>
                    <td><?= $this->Number->format($invoiceItem->net_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Discount') ?></th>
                    <td><?= $this->Number->format($invoiceItem->discount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tax Amount') ?></th>
                    <td><?= $this->Number->format($invoiceItem->tax_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($invoiceItem->create_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $invoiceItem->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
