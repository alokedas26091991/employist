<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvoiceItem $invoiceItem
 * @var string[]|\Cake\Collection\CollectionInterface $invoices
 * @var string[]|\Cake\Collection\CollectionInterface $products
 * @var string[]|\Cake\Collection\CollectionInterface $examinations
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $invoiceItem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceItem->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Invoice Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="invoiceItems form content">
            <?= $this->Form->create($invoiceItem) ?>
            <fieldset>
                <legend><?= __('Edit Invoice Item') ?></legend>
                <?php
                    echo $this->Form->control('invoice_id', ['options' => $invoices]);
                    echo $this->Form->control('gross_amount');
                    echo $this->Form->control('net_amount');
                    echo $this->Form->control('discount');
                    echo $this->Form->control('tax_amount');
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('examination_id', ['options' => $examinations]);
                    echo $this->Form->control('create_date');
                    echo $this->Form->control('is_deleted');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
