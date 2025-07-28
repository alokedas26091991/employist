<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Invoice'), ['action' => 'edit', $invoice->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Invoice'), ['action' => 'delete', $invoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Invoices'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Invoice'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="invoices view content">
            <h3><?= h($invoice->invoice_no) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $invoice->has('user') ? $this->Html->link($invoice->user->id, ['controller' => 'Users', 'action' => 'view', $invoice->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Invoice No') ?></th>
                    <td><?= h($invoice->invoice_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Txn Id') ?></th>
                    <td><?= h($invoice->txn_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($invoice->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gross Amount') ?></th>
                    <td><?= $this->Number->format($invoice->gross_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Net Amount') ?></th>
                    <td><?= $this->Number->format($invoice->net_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tax Amount') ?></th>
                    <td><?= $this->Number->format($invoice->tax_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Discount Amount') ?></th>
                    <td><?= $this->Number->format($invoice->discount_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($invoice->create_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $invoice->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $invoice->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
